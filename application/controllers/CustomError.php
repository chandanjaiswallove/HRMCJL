<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class CustomError extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Card_Model', 'Card');
	}

    public function index()
    {
        $this->output->set_status_header(404);

        // Database data
        $data['card'] = $this->Card->get_card();

        if ($this->session->userdata('logged_in')) {
            $this->load->view('errors/DashboardError', $data);
        } else {
            $this->load->view('errors/CustomError', $data);
        }
    }
}
?>