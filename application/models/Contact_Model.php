<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// PHPMailer library use kar rahe hain
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer ki required files load
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
        // Form se aaya hua data array me store ho raha hai
        $data = array(
            'visitor_fullname' => $this->input->post('full_name', TRUE),
            'visitor_email' => $this->input->post('email', TRUE), // USER ka email
            'visitor_phone' => $this->input->post('phone_number', TRUE),
            'visitor_subject' => $this->input->post('subject', TRUE),
            'visitor_message' => $this->input->post('message', TRUE),
            'contact_date' => date('Y-m-d H:i:s')
        );

        // Data database table me save ho raha hai
        if ($this->db->insert('contact_directory', $data)) {

            // ==============================
            // PHPMailer Start
            // ==============================
            $mail = new PHPMailer(true);

            try {

                // SMTP enable (Gmail server use hoga)
                $mail->isSMTP();

                // Gmail SMTP server
                $mail->Host = 'smtp.gmail.com';

                // Login enable
                $mail->SMTPAuth = true;

                // ⚡ YE EMAIL WEBSITE KA HAI (EMAIL SEND KARNE WALA)
                $mail->Username = 'cjljaiswal@gmail.com';

                // ⚡ IS EMAIL KA APP PASSWORD
                $mail->Password = 'gfivmwzsayviaalt';

                // Secure connection
                $mail->SMTPSecure = 'tls';

                // Gmail SMTP port
                $mail->Port = 587;

                // ⚡ EMAIL KIS EMAIL SE JAYEGA
                $mail->setFrom('cjljaiswal@gmail.com', 'Website Contact');

                // ⚡ EMAIL KISKO MILEGA (OWNER EMAIL)
                $mail->addAddress('chandanjaiswalloves@gmail.com');

                // Email HTML format me bhejna
                $mail->isHTML(true);

                // Email subject
                $mail->Subject = 'New Contact Message';

                // Email message body
                $mail->Body = "
<h3>New Contact Inquiry - Jaiswal</h3>
<hr>

<p><b>Name:</b> {$data['visitor_fullname']}</p>

<p><b>Email:</b> {$data['visitor_email']}</p>

<p><b>Phone:</b> {$data['visitor_phone']}</p>

<p><b>Subject:</b> {$data['visitor_subject']}</p>

<p><b>Message:</b><br>{$data['visitor_message']}</p>
";

                // Email send ho jayega
                $mail->send();

            } catch (Exception $e) {

                // Agar email send nahi hua to error handle ho sakta hai
            }

            // Success message
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