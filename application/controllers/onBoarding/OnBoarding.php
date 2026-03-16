<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Card_Model $Card
 * @property ClientReviewModel $Review

 */
class OnBoarding extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Card_Model', 'Card'); // common data (logo / card)
        $this->load->model('ClientReviewModel', 'Review'); // Client Review Model load for Client Review page
    }

    private function load_auth_page($page)
    {
        $data['card'] = $this->Card->get_card(); // header / footer ke liye data

        // Header
        $this->load->view('onBoarding/layouts/authHeader', $data);

        // Page
        $this->load->view('onBoarding/pages/' . $page, $data);

        // Footer
        $this->load->view('onBoarding/layouts/authFooter', $data);
    }

    public function developer_login()
    {
        $this->load_auth_page('developer_login');
    }

    public function loaDdeveloper_signup()
    {
        $this->load_auth_page('developer_signup');
    }

    public function developer_forgot()
    {
        $this->load_auth_page('developer_forgot');
    }

    public function loaDverify()
    {
        $this->load_auth_page('verify');
    }

    public function new_credentials()
    {
        $this->load_auth_page('new_credentials');
    }

    public function loaDsignup_otp()
    {
        $this->load_auth_page('signup_otp');
    }

    public function loaDclient_review()
    {
        $this->load_auth_page('client_review');
    }

    public function modeLclient_review()
    {
        $this->Review->client_review();  // Client Review Model load and Function call for Client Review page
    }

    


}
