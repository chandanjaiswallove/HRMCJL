<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'third_party/PHPMailer-master/src/Exception.php';
require APPPATH . 'third_party/PHPMailer-master/src/PHPMailer.php';
require APPPATH . 'third_party/PHPMailer-master/src/SMTP.php';

class Contact_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_contactVisitor()
    {
        // ================= FORM DATA =================
        $data = array(
            'visitor_fullname' => $this->input->post('full_name', TRUE),
            'visitor_email' => $this->input->post('email', TRUE),
            'visitor_phone' => $this->input->post('phone_number', TRUE),
            'visitor_subject' => $this->input->post('subject', TRUE),
            'visitor_message' => $this->input->post('message', TRUE),
            'contact_date' => date('Y-m-d H:i:s')
        );

        // ================= INSERT DB =================
        if ($this->db->insert('contact_directory', $data)) {

            // ================= REGISTERED USER EMAIL FETCH =================
            $user = $this->db->select('email')
                             ->get('register_directory')
                             ->row();

            if (!$user || empty($user->email)) {
                return;
            }

            // ================= PHPMailer =================
            $mail = new PHPMailer(true);

            try {

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;

                // WEBSITE EMAIL
                $mail->Username = 'cjljaiswal@gmail.com';

                // APP PASSWORD
                $mail->Password = 'gfivmwzsayviaalt';

                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // EMAIL WEBSITE SE JAYEGA
                $mail->setFrom('cjljaiswal@gmail.com', 'Website Contact');

                // EMAIL REGISTER USER KO JAYEGA
                $mail->addAddress($user->email);

                $mail->isHTML(true);

                $mail->Subject = 'New Contact Message';

                $mail->Body = "
                <h3>New Contact Inquiry</h3>
                <hr>

                <p><b>Name:</b> {$data['visitor_fullname']}</p>

                <p><b>Email:</b> {$data['visitor_email']}</p>

                <p><b>Phone:</b> {$data['visitor_phone']}</p>

                <p><b>Subject:</b> {$data['visitor_subject']}</p>

                <p><b>Message:</b><br>{$data['visitor_message']}</p>
                ";

                $mail->send();

            } catch (Exception $e) {

                log_message('error', 'Mail Error: ' . $mail->ErrorInfo);

            }

            sweetAlert(
                'Success',
                'Your message has been sent successfully',
                'success',
                base_url()
            );

        } else {

            sweetAlert(
                'Error',
                'Something went wrong',
                'error',
                base_url()
            );

        }
    }
}