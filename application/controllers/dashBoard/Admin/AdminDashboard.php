<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Card_Model $Card
 * @property Dashboard_Model $Dash
 * @property Introduce_Model $Introduce
 * @property Service_Model $Service
 * @property About_Model $About 
 * @property Skill_Model $Skill
 * @property Testimonial_Model $Testimonial
 * @property PortfolioProject_Model $PortProject
 * @property Price_Model $Price
 * @property Resume_Model $Resume
 */

class AdminDashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        // 🔐 SESSION CHECK
        if (!$this->session->userdata('logged_in')) {
            redirect('onBoarding');
            exit;
        }

        // 🚫 Cache disable
        $this->output
            ->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output
            ->set_header("Pragma: no-cache");

        // Models
        $this->load->model('Card_Model', 'Card');
        $this->load->model('Dashboard_Model', 'Dash');
        $this->load->model('Introduce_Model', 'Introduce');
        $this->load->model('Service_Model', 'Service');
        $this->load->model('About_Model', 'About');
        $this->load->model('Skill_Model', 'Skill');
        $this->load->model('Testimonial_Model', 'Testimonial');
        $this->load->model('PortfolioProject_Model', 'PortProject');
        $this->load->model('Price_Model', 'Price');
        $this->load->model('Resume_Model', 'Resume');

    }





    // Generic page loader
    private function load_page($page)
    {


        $data['card'] = $this->Card->get_card(); // Header/footer ke liye data Profile_card ka Data
        $data['intro'] = $this->Dash->get_introduceData(); // Header/footer ke liye data Profile_card ka Data from Dashboard_Model
        $data['about'] = $this->Dash->get_aboutData();       // ✅ About data  from Dashboard_Model
        $data['service'] = $this->Dash->get_serviceData();       // services_directory Data from Dashboard_Model
        $data['skill'] = $this->Dash->get_myskill_directory();  // get_myskill_directory Data from Dashboard_Model
        $data['contacts'] = $this->Dash->get_contact_directory();   // get_contact_directory Data from Dashboard_Model
        $data['notifications'] = $this->Dash->get_notifications();
        $data['notification_count'] = $this->Dash->count_new_messages();
        $data['testimonials'] = $this->Dash->get_testimonial_directory();   // get_testimonial_directory ata from Dashboard_Model
        $data['company_logos'] = $this->Dash->get_company_logoData();   // get_company_logoData from Dashboard_Model
        $data['portfolios'] = $this->Dash->get_portfolio_projects();    //  project page data from Dashboard_Model
        $data['pricing_cards'] = $this->Dash->get_price_card();         /// Price Card data from Dashboard Model
        $data['education'] = $this->Dash->get_educationData();          //// Resume Data from Dashboard Model

        $this->load->view('dashboard/admin/layouts/dashHeader', $data);

        // Page content
        $this->load->view('dashboard/admin/pages/' . $page, $data);

        // Footer
        $this->load->view('dashboard/admin/layouts/dashFooter', $data);

    }







    ////// Delete function btn /////
    public function deleteSection()
    {
        // $this->load->model('/Service_Model');
        $this->Service->deleteBtn();
    }

    public function modeLdeleteSkill()  /// deldeteSkill function load from my skill model
    {
        $this->Skill->deleteSkill();
    }

    public function modeLremoveTestimonial()
    {      //// removeTestimonial function load from Testimonial
        $this->Testimonial->removeTestimonial();
    }


    public function modeLtestimonialremoveLogo()    //// Remove Testimonail Company logo model function call here 
    {
        $this->Testimonial->testimonialremoveLogo();
    }

    public function modeLportfolioProjectRemove()   ////  Remove Portfolio Project PortfolioProject_Model function call here
    {
        $this->PortProject->portfolioProjectRemove();
    }

    public function modeLdeletePriceCard()   /// Delete price card
    {
        $this->Price->deletePriceCard();
    }

    //=================== Dashboard Pages model Here ===================== ///


    public function modeLupdate_profile()   // Card Model Function
    {
        $this->Card->save_profile_card();
    }


    public function modeLintroduce_update()    // Introuduce_MOdel Function
    {
        $this->Introduce->save_introude_update();
    }


    public function modeLabout_Update()         /// About Model function call here 
    {
        $this->About->save_about_Update();
    }


    public function modeLinsertService()    /// Service Model function call here 
    {
        $this->Service->save_insert_service();
    }

    public function modeLinsert_service_update()    /// Service Model function call here 
    {
        $this->Service->service_update();
    }


    public function modeLskill_update() ///  Skill Model call here
    {
        $this->Skill->insert_skill_update();
    }

    public function modeLupdate_skill()  ///  Skill Model call here
    {
        $this->Skill->skill_update();
    }


    public function modeLinsertTestimonial()    /// Testimonial Model call here
    {
        $this->Testimonial->insertTestimonial();
    }

    public function modeLupdateTestimonial()    /// Testimonial Model call here
    {
        $this->Testimonial->update_Testimonials();
    }


    public function modeLinsertCompanyLogo()    /// Testimonial Model call here
    {
        $this->Testimonial->uploadCompanyLogoImage();
    }


    public function modeLupdateCompanyLogoImage()       /// Testimonial Model call here
    {
        $this->Testimonial->updateCompanyLogoImage();
    }

    public function modeLinsertPortProj()   //// PortfolioProject_Model function load here
    {
        $this->PortProject->insertPortProj();
    }

    public function modeLupdatePortProj()   /// Portfolio Project_Model function load here
    {
        $this->PortProject->updatePortProj();
    }

    public function modeLinsertPricecard()  /// Pricing Card model function load here
    {
        $this->Price->insertPricecard();
    }

    public function modeLupdatePriceCard()  // Pricing card model update funciton load here
    {
        $this->Price->updatePriceCard();
    }


    public function modeLupdateResume()  // Resume  model update funciton load here
    {
        $this->Resume->updateResume();
    }

    //=================== Dashboard Pages model End ===================== ///





    ///////////////////// Ab har page method sirf load_page ko call karega //////////////
    public function loaDadmin_dashboard()
    {
        $this->load_page('admin_dashboard');
    }

    public function loaDabout()
    {
        $this->load_page('about');
    }

    public function loaDintroduce()
    {
        $this->load_page('introduce');
    }

    public function loaDmyskill()
    {
        $this->load_page('myskill');
    }

    public function loaDprofile_card()
    {
        $this->load_page('profile_card');
    }

    public function loaDservices()
    {
        $this->load_page('services');
    }

    public function loaDtestimonials()
    {
        $this->load_page('testimonials');
    }

    // public function loaDvisitor_data()
    // {
    //     $this->load_page('visitor_data');
    // }

public function loadvisitor_data()
{
    $this->Dash->mark_all_read();  // Model function call
    $this->load_page('visitor_data');
}

    public function loaDresume()
    {
        $this->load_page('resume');
    }

    public function loaDProject()
    {
        $this->load_page('portfolio');
    }

    public function loaDpricing_card()
    {
        $this->load_page('pricing_card');
    }





}