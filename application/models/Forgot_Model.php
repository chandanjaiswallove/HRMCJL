<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Forgot_Model extends CI_Model
{
    public function send_otp_func()
    {
        $CI =& get_instance();
        $email = $CI->input->post('email');

        $user = $this->db->where('email', $email)
            ->get('register_directory')
            ->row();
        if (!$user) {
            sweetAlert('Oops', 'Email not registered', 'error', base_url('onBoarding_forgot'));
            return;
        }

        $otp = rand(100000, 999999);
        $this->db->where('email', $email)
            ->update('register_directory', ['reset_otp' => $otp]);

        $this->send_mail($email, $otp);

        $CI->session->set_userdata('reset_email', $email);
        sweetAlert('Success', 'OTP sent to your email', 'success', base_url('onBoarding_verify'));
    }

    public function verify_otp_func()
    {
        $CI =& get_instance();
        $email = $CI->session->userdata('reset_email');
        $otp = $CI->input->post('otp');

        $check = $this->db->where('email', $email)
            ->where('reset_otp', $otp)
            ->get('register_directory')
            ->row();
        if ($check) {
            sweetAlert('Success', 'OTP Verified', 'success', base_url('onBoarding_credentials'));
        } else {
            sweetAlert('Oops', 'Invalid OTP', 'error', base_url('onBoarding_verify'));
        }
    }

    public function update_password_func()
    {
        $CI =& get_instance();
        $email = $CI->session->userdata('reset_email');

        $password = $CI->input->post('password');
        $confirm = $CI->input->post('confirm_password');

        // ✅ Check if passwords match
        if ($password !== $confirm) {
            sweetAlert('Oops', 'Passwords do not match', 'error', base_url('onBoarding_credentials'));
            return;
        }

        $this->db->where('email', $email)
            ->update('register_directory', [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'reset_otp' => NULL
            ]);

        $CI->session->unset_userdata('reset_email');
        sweetAlert('Success', 'Password updated successfully', 'success', base_url('onBoarding'));
    }

    public function send_mail($email, $otp)
    {
        require APPPATH . 'third_party/PHPMailer-master/src/Exception.php';
        require APPPATH . 'third_party/PHPMailer-master/src/PHPMailer.php';
        require APPPATH . 'third_party/PHPMailer-master/src/SMTP.php';

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cjljaiswal@gmail.com';
            $mail->Password = 'gfivmwzsayviaalt';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('cjljaiswal@gmail.com', 'Developer Portal');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset OTP';
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width:600px; margin:0 auto; padding:20px; text-align:center; background:#f9f9f9; border-radius:10px;'>
            <h2 style='color:#333;'>Password Reset Request</h2>
            <p style='font-size:16px; color:#555;'>Use the following OTP to reset your password:</p>
            <h1 style='font-size:36px; font-weight:bold; color:#007bff; margin:20px 0;'>$otp</h1>
            <p style='font-size:14px; color:#888;'>Do not share this OTP with anyone. This OTP is valid for a limited time only.</p>
        </div>
        ";            $mail->send();
        } catch (Exception $e) {
            sweetAlert('Oops', 'Mail sending failed: ' . $e->getMessage(), 'error', base_url('onBoarding_forgot'));
        }
    }
}