<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Card_Model $Card
 * @property Contact_Model $Contact
 * @property Dashboard_Model $Dash
 */
class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Card_Model', 'Card');
		$this->load->model('Contact_Model', 'Contact');
		$this->load->model('Dashboard_Model', 'Dash');


	}


	/////	All data come from model aand pass with variable name for welcome page
	public function index()
	{
		$data['card'] = $this->Card->get_card();
	    $data['contacts'] = $this->Dash->get_contact_directory();   // get_contact_directory Data from Dashboard_Model


		$this->load->view('welcome_message', $data);
	}


	public function modeLsave_contactVisitor()      /// Contact Model Function
	{
		$this->load->model('Contact_Model');
		$this->Contact_Model->save_contactVisitor();
	}
}
