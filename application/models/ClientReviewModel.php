<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'third_party/PHPMailer-master/src/Exception.php';
require APPPATH . 'third_party/PHPMailer-master/src/PHPMailer.php';
require APPPATH . 'third_party/PHPMailer-master/src/SMTP.php';

class ClientReviewModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // ================= CLIENT REVIEW SUBMIT =================
    public function client_review()
    {
        $profile_name = $this->input->post('profile_name', true);
        $company_name = $this->input->post('company_name', true);
        $client_project_name = $this->input->post('client_project_name', true);
        $client_review = $this->input->post('client_review', true);

        $profile_photo = null;
        $company_logo = null;

        // ================= PROFILE PHOTO =================
        if (!empty($_FILES['profile_photo']['name'])) {
            $profile_photo = $this->uploadImage('profile_photo');
            if (!$profile_photo) return;
        }

        // ================= COMPANY LOGO =================
        if (!empty($_FILES['company_logo']['name'])) {
            $company_logo = $this->uploadImage('company_logo');
            if (!$company_logo) return;
        }

        // ================= INSERT INTO DB =================
        $insertData = [
            'testimonial_date' => date('Y-m-d H:i:s'),
            'profile_name' => $profile_name,
            'profile_photo' => $profile_photo,
            'company_name' => $company_name,
            'company_logo' => $company_logo,
            'client_project_name' => $client_project_name,
            'client_review' => $client_review,
            'status' => 'pending'
        ];

        if ($this->db->insert('testimonial_directory', $insertData)) {
            $this->sendOwnerNotification($profile_name, $client_project_name, $client_review);
            $this->sweetAlertModel('Thank You!', 'Your feedback has been submitted successfully!', 'success', true);
        } else {
            $this->sweetAlertModel('Error', 'Failed to submit feedback!', 'error', false);
        }
    }

    // ================= IMAGE UPLOAD FUNCTION =================
    private function uploadImage($field)
    {
        $upload_path = FCPATH . 'uploads/testimonials/';
        if (!is_dir($upload_path)) mkdir($upload_path, 0755, true);

        $config = [
            'upload_path' => $upload_path,
            'allowed_types' => 'jpg|jpeg|png|webp',
            'max_size' => 5120,
            'encrypt_name' => TRUE
        ];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field)) {
            $this->sweetAlertModel('Upload Failed', strip_tags($this->upload->display_errors()), 'error', false);
            return false;
        }

        $uploadData = $this->upload->data();
        return 'uploads/testimonials/' . $uploadData['file_name'];
    }

    // ================= EMAIL NOTIFICATION =================
    private function sendOwnerNotification($profile_name, $client_project_name, $client_review)
    {
        $user = $this->db->select('email')->get('register_directory')->row();
        if (!$user || empty($user->email)) return;

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cjljaiswal@gmail.com'; // website email
            $mail->Password = 'gfivmwzsayviaalt';     // app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('cjljaiswal@gmail.com', 'Website Notification');
            $mail->addAddress($user->email);

            $mail->isHTML(true);
            $mail->Subject = 'New Client Review Submitted';
            $mail->Body = "
                <div style='font-family: Arial,sans-serif; max-width:600px; padding:20px; background:#f9f9f9; border-radius:10px;'>
                    <h3>New Client Review Received</h3>
                    <p><strong>Profile Name:</strong> {$profile_name}</p>
                    <p><strong>Project Name:</strong> {$client_project_name}</p>
                    <p><strong>Review:</strong> {$client_review}</p>
                </div>
            ";

            $mail->send();
        } catch (Exception $e) {
            log_message('error', 'Mail Error: ' . $mail->ErrorInfo);
        }
    }

    // ================= SWEET ALERT =================
    private function sweetAlertModel($title, $text, $icon, $closeTab = false)
    {
        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: '$title',
                text: '$text',
                icon: '$icon'
            }).then(function() {";
        if ($closeTab) echo "window.location.href = 'about:blank';";
        echo "});
        });
        </script>";
        exit;
    }
}