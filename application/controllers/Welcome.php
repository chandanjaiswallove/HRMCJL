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
		$data['education'] = $this->Dash->get_educationData();
		$data['intro'] = $this->Dash->get_introduceData();
		$data['about'] = $this->Dash->get_aboutData();
		$data['service'] = $this->Dash->get_serviceData();       // services_directory Data from Dashboard_Model
		$data['skill'] = $this->Dash->get_myskill_directory();  // get_myskill_directory Data from Dashboard_Model
		$data['portfolios'] = $this->Dash->get_portfolio_projects();    //  project page data from Dashboard_Model
		$data['pricing_cards'] = $this->Dash->get_price_card();         /// Price Card data from Dashboard Model
		$data['company_logos'] = $this->Dash->get_company_logoData();   // get_company_logoData from Dashboard_Model
	    $data['testimonials'] = $this->Dash->get_testimonial_directory();   // get_testimonial_directory ata from Dashboard_Model
	    $data['contacts'] = $this->Dash->get_contact_directory();   // get_contact_directory Data from Dashboard_Model


		$this->load->view('welcome_message', $data);
	}


	public function modeLsave_contactVisitor()      /// Contact Model Function
	{
		$this->load->model('Contact_Model');
		$this->Contact_Model->save_contactVisitor();
	}
}
