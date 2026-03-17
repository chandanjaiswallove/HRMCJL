<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'third_party/PHPMailer-master/src/Exception.php';
require APPPATH . 'third_party/PHPMailer-master/src/PHPMailer.php';
require APPPATH . 'third_party/PHPMailer-master/src/SMTP.php';

class OnBoarding_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // ================= SEND OTP =================
    public function sendOtp()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        $user_id = $this->input->post('user_id');

        // Password check
        if ($password !== $confirm_password) {
            return 'password_mismatch';
        }

        // Only one user check
        if ($this->db->count_all('register_directory') >= 1) {
            return 'single_user_only';
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Store in session
        $this->session->set_userdata([
            'otp' => $otp,
            'otp_time' => time(),
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'user_id' => $user_id
        ]);

        // Send Email
        if ($this->sendMail($email, $otp)) {
            return 'otp_sent';
        } else {
            return 'mail_failed';
        }
    }

    // ================= VERIFY OTP =================
    public function verifyOtp()
    {
        $user_otp = $this->input->post('signup_otp');
        $session_otp = $this->session->userdata('otp');
        $otp_time = $this->session->userdata('otp_time');

        // Expiry check (5 min)
        if (time() - $otp_time > 300) {
            $this->session->unset_userdata(['otp', 'otp_time']);
            return 'otp_expired';
        }

        // Match
        if ($user_otp != $session_otp) {
            return 'invalid_otp';
        }

        // Insert DB
        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'email' => $this->session->userdata('email'),
            'password' => $this->session->userdata('password'),
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('register_directory', $data);

        // Welcome Mail
        $this->sendWelcomeMail($data['email']);

        // Clear session
        $this->session->unset_userdata(['otp', 'otp_time', 'email', 'password', 'user_id']);

        return 'success';
    }

    // ================= SEND OTP MAIL =================
    private function sendMail($to, $otp)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cjljaiswal@gmail.com';
            $mail->Password = 'gfivmwzsayviaalt';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('cjljaiswal@gmail.com', 'Website');
            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width:600px; margin:auto; background:#f4f6f9; padding:20px; border-radius:10px;'>

            <div style='background:#ffffff; padding:30px; border-radius:10px; text-align:center;'>

                <h2 style='color:#333; margin-bottom:10px;'>🔐 Email Verification</h2>

                <p style='font-size:16px; color:#555;'>
                    Use the OTP below to complete your registration.
                </p>

                <div style='margin:25px 0;'>
                    <span style='display:inline-block; font-size:32px; letter-spacing:5px; font-weight:bold; color:#007bff; background:#eef4ff; padding:15px 25px; border-radius:8px;'>
                        $otp
                    </span>
                </div>

                <p style='font-size:14px; color:#888;'>
                    This OTP is valid for 5 minutes. Do not share it with anyone.
                </p>

            </div>

            <p style='text-align:center; font-size:12px; color:#aaa; margin-top:15px;'>
                © " . date('Y') . " Jaiswal. All rights reserved.
            </p>

        </div>
        ";
            return $mail->send();

        } catch (Exception $e) {
            log_message('error', $mail->ErrorInfo);
            return false;
        }
    }

    // ================= WELCOME MAIL =================
    private function sendWelcomeMail($to)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cjljaiswal@gmail.com';
            $mail->Password = 'gfivmwzsayviaalt';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('cjljaiswal@gmail.com', 'Website');
            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->Subject = 'Welcome';
            $mail->Body = "
<div style='font-family: Arial, sans-serif; max-width:600px; margin:auto; background:#f4f6f9; padding:20px; border-radius:10px;'>

    <div style='background:#ffffff; padding:30px; border-radius:10px; text-align:center;'>

        <h2 style='color:#28a745;'>🎉 Welcome to Our Website</h2>

        <p style='font-size:16px; color:#555; margin-top:10px;'>
            Your registration has been successfully completed.
        </p>

        <div style='margin:25px 0;'>
            <span style='font-size:40px;'>🚀</span>
        </div>

        <p style='font-size:15px; color:#666;'>
            You can now log in and start using our services.
        </p>

        <a href='" . base_url('onBoarding') . "' 
           style='display:inline-block; margin-top:20px; padding:12px 25px; background:#007bff; color:#fff; text-decoration:none; border-radius:5px; font-size:15px;'>
           Login Now
        </a>

    </div>

    <p style='text-align:center; font-size:12px; color:#aaa; margin-top:15px;'>
        © " . date('Y') . " Jaiswal. All rights reserved.
    </p>

</div>
";
            $mail->send();

        } catch (Exception $e) {
            log_message('error', $mail->ErrorInfo);
        }
    }







    // without otp function for register//    public function registerStudent()
// {
//     $email            = trim($this->input->post('email'));
//     $user_id          = trim($this->input->post('user_id'));
//     $password         = (string) $this->input->post('password');
//     $confirm_password = (string) $this->input->post('confirm_password');

    //     // ================= PASSWORD MISMATCH =================
//     if ($password !== $confirm_password) {
//         return 'password_mismatch';
//     }

    //     // ================= ONLY ONE USER CHECK =================
//     $totalUsers = $this->db->count_all('register_directory');

    //     if ($totalUsers >= 1) {
//         return 'single_user_only';
//     }

    //     // ================= INSERT =================
//     $data = [
//         'user_id'    => $user_id,
//         'email'      => $email,
//         'password'   => password_hash($password, PASSWORD_BCRYPT),
//         'status'     => 1,
//         'created_at' => date('Y-m-d H:i:s'),
//         'updated_at' => date('Y-m-d H:i:s')
//     ];

    //     return $this->db->insert('register_directory', $data)
//         ? 'success'
//         : 'failed';
// }


















    //=============== Login Student with Set Session ============///


    public function loginStudent()
    {
        $user_id = trim($this->input->post('user_id'));
        $email = trim($this->input->post('email'));
        $password = (string) $this->input->post('password');

        // ================= GET SINGLE USER =================
        $user = $this->db
            ->where('user_id', $user_id)
            ->where('email', $email)
            ->get('register_directory')
            ->row();

        if (!$user) {
            return 'invalid_credentials';
        }

        // ================= PASSWORD VERIFY =================
        if (!password_verify($password, $user->password)) {
            return 'wrong_password';
        }

        // ================= SUCCESS =================
        return [
            'status' => 'success',
            'user' => $user
        ];
    }




}