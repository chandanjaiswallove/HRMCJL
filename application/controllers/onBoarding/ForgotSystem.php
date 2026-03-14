<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotSystem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Forgot_Model','Forgot'); // model load
    }

    // Function names same as routes
    public function modeLsend_otp()
    {
        $this->Forgot->send_otp_func();  // model me input fetch + DB + mail + redirect
    }

    public function modeLverify_otp()
    {
        $this->Forgot->verify_otp_func();  // model me input fetch + verify + redirect
    }

    public function modeLupdate_password()
    {
        $this->Forgot->update_password_func();  // model me input fetch + DB update
    }
}