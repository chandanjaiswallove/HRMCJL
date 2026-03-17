<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthOnBoarding extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OnBoarding_Model');
    }

    // SEND OTP
    public function modeLsendOtp()
    {
        $status = $this->OnBoarding_Model->sendOtp();

        if ($status == 'otp_sent') {
            redirect('signup_otp');
        } elseif ($status == 'password_mismatch') {
            sweetAlert('Error', 'Password mismatch', 'error', 'onBoardingUser');
        } elseif ($status == 'single_user_only') {
            sweetAlert('Warning', 'Only one user allowed', 'warning', 'onBoarding');
        } else {
            sweetAlert('Error', 'Mail failed', 'error', 'onBoardingUser');
        }
    }

    // VERIFY OTP
    public function modeLverifyOtp()
    {
        $status = $this->OnBoarding_Model->verifyOtp();

        if ($status == 'success') {
            sweetAlert('Success', 'Registration Complete', 'success', 'onBoarding');
        } elseif ($status == 'otp_expired') {
            sweetAlert('Expired', 'OTP expired', 'error', 'onBoardingUser');
        } else {
            sweetAlert('Error', 'Invalid OTP', 'error', 'signup_otp');
        }
    }









    // ================= REGISTER USER without otp funciton  =================
    // public function modeLregisterUser()
    // {
    //     $status = $this->OnBoarding_Model->registerStudent();

    //     switch ($status) {

    //         case 'password_mismatch':
    //             sweetAlert(
    //                 'Password Mismatch',
    //                 'Password and Confirm Password do not match.',
    //                 'error',
    //                 base_url('onBoardingUser')
    //             );
    //             break;

    //         case 'single_user_only':
    //             sweetAlert(
    //                 'Registration Closed',
    //                 'Only one user can be registered in this system.',
    //                 'warning',
    //                 base_url('onBoarding')
    //             );
    //             break;

    //         case 'success':
    //             sweetAlert(
    //                 'Success',
    //                 'Registration successful!',
    //                 'success',
    //                 base_url('onBoarding')
    //             );
    //             break;

    //         default:
    //             sweetAlert(
    //                 'Failed',
    //                 'Something went wrong. Please try again.',
    //                 'error',
    //                 base_url('onBoardingUser')
    //             );
    //     }
    // }












    public function modeLloginStudent()
    {
        $result = $this->OnBoarding_Model->loginStudent();

        // LOGIN ERROR
        if (is_string($result)) {

            if ($result === 'invalid_credentials') {
                sweetAlert('Login Failed', 'User ID or Email not found.', 'error', base_url('onBoarding'));
                redirect('onBoarding');
                exit;
            }

            if ($result === 'wrong_password') {
                sweetAlert('Login Failed', 'Incorrect password.', 'error', base_url('onBoarding'));
                redirect('onBoarding');
                exit;
            }
        }

        // LOGIN SUCCESS
        if (is_array($result) && $result['status'] === 'success') {

            $user = $result['user'];

            // 🔐 SESSION SET
            $this->session->set_userdata([
                'user_id' => $user->user_id,
                'email' => $user->email,
                'logged_in' => true
            ]);

            // SweetAlert via helper
            sweetAlert('Welcome', 'Login successful!', 'success', base_url('admin_playground'));
            redirect('admin_playground');
            exit;
        }
    }




    //// logout system

    public function logout()
    {
        // 🔓 REMOVE SPECIFIC SESSION DATA
        $this->session->unset_userdata([
            'user_id',
            'email',
            'logged_in'
        ]);

        // OR (FULL DESTROY)
        $this->session->sess_destroy();

        // cache clear headers
        $this->output
            ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $this->output
            ->set_header("Pragma: no-cache");
        $this->output
            ->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        // SweetAlert helper call
        sweetAlert(
            'Logged Out',
            'You have been logged out successfully!',
            'success',
            base_url('/')
        );

    }



}