<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Card_Model $Card
 */

class Extra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Card_Model', 'Card'); // SAME MODEL
    }

    public function loaDextra()
    {
        $data['card'] = $this->Card->get_card(); // DB se data
        $this->load->view('fronted/pages/extra', $data); // View ko bhejo
    }
}
