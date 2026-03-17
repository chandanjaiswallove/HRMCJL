<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = 'CustomError';
$route['translate_uri_dashes'] = FALSE;


$route['insert_contact'] = 'Welcome/modeLsave_contactVisitor';   // Contact Model

///================= onBoarding controller start ===========
$route['onBoardingUser'] = 'onBoarding/OnBoarding/loaDdeveloper_signup';

$route['onBoarding'] = 'onBoarding/OnBoarding/developer_login';

// pages
$route['onBoarding_forgot'] = 'onBoarding/OnBoarding/developer_forgot';
$route['onBoarding_verify'] = 'onBoarding/OnBoarding/loaDverify';
$route['onBoarding_credentials'] = 'onBoarding/OnBoarding/new_credentials';
$route['signup_otp'] = 'onBoarding/OnBoarding/loaDsignup_otp';

/// Client Review page route in Onboarding Controller & page load function loaDclient_review() in OnBoarding Controller
$route['ra1skd25leaviewclient9kasd720kaulsid'] = 'onBoarding/OnBoarding/loaDclient_review';
// actions
$route['submit-client-review/_a1c2b3d4_e5f6_7890_1234_abcdef123456'] = 'onBoarding/OnBoarding/modeLclient_review';  // Client Review Model function call here from OnBoarding Controller


// actions
$route['jsliysyssend_otppywstyqwr'] = 'onBoarding/ForgotSystem/modeLsend_otp';
$route['verify_otp'] = 'onBoarding/ForgotSystem/modeLverify_otp';
$route['update_password'] = 'onBoarding/ForgotSystem/modeLupdate_password';

/// OnBoarding Model function calling here from OnBoarding Contrllers


// Handle signup form submission
$route['ef123456lssend_otp_register1c2b3d4e5'] = 'onBoarding/AuthOnBoarding/modeLsendOtp';
$route['a1c2b3d4e5f6g7h8i9j0verify_otp_registerabcdef123456'] = 'onBoarding/AuthOnBoarding/modeLverifyOtp';

$route['onboardingowidhuseronHomelijas'] = 'onBoarding/AuthOnBoarding/modeLloginStudent';


//   logout funciton route here 
$route['logout'] = 'onBoarding/AuthOnBoarding/logout';



///================= onBoarding controller end ===============



///================= Fronted controller start ==============
$route['extras_coming_soon'] = 'fronted/Extra/loaDextra';


///================= Fronted controller end =================



///================= Dashboard  controller start ==============
$route['admin_playground'] = 'dashBoard/Admin/AdminDashboard/loaDadmin_dashboard';
$route['about'] = 'dashBoard/Admin/AdminDashboard/loaDabout';

$route['introduce'] = 'dashBoard/Admin/AdminDashboard/loaDintroduce';
$route['my_skill'] = 'dashBoard/Admin/AdminDashboard/loaDmyskill';

$route['profile_card'] = 'dashBoard/Admin/AdminDashboard/loaDprofile_card';
$route['services'] = 'dashBoard/Admin/AdminDashboard/loaDservices';

$route['testimonials'] = 'dashBoard/Admin/AdminDashboard/loaDtestimonials';
$route['visitors'] = 'dashBoard/Admin/AdminDashboard/loadvisitor_data';

$route['resume'] = 'dashBoard/Admin/AdminDashboard/loaDresume';
$route['projects'] = 'dashBoard/Admin/AdminDashboard/loaDProject';

$route['pricing'] = 'dashBoard/Admin/AdminDashboard/loaDpricing_card';

///================= Dashboard  controller end =================






///================= Dashboard  controller model function call here   =================
$route['update_profile'] = 'dashBoard/Admin/AdminDashboard/modeLupdate_profile';    /// Card_Model
$route['update_introduce'] = 'dashBoard/Admin/AdminDashboard/modeLintroduce_update';    /// Introduce_Model
$route['about_update'] = 'dashBoard/Admin/AdminDashboard/modeLabout_Update';            /// About_Model
$route['insert_service'] = 'dashBoard/Admin/AdminDashboard/modeLinsertService';         /// Service_Model\
$route['insert_service_update'] = 'dashBoard/Admin/AdminDashboard/modeLinsert_service_update';         /// Service_Model



$route['insert_skill'] = 'dashBoard/Admin/AdminDashboard/modeLskill_update';            /// Skill_Model 
$route['update_skill'] = 'dashBoard/Admin/AdminDashboard/modeLupdate_skill';      /// Skill_Model 

$route['updateTestimonial'] = 'dashBoard/Admin/AdminDashboard/modeLupdateTestimonial';      /// Testimonial Model 
$route['approveTestimonial'] = 'dashBoard/Admin/AdminDashboard/modeLapproveTestimonial';      /// Testimonial Model testimonialLogo function for update logo in testimonial section


$route['insertPortProj'] = 'dashBoard/Admin/AdminDashboard/modeLinsertPortProj';
$route['updatePortProj'] = 'dashBoard/Admin/AdminDashboard/modeLupdatePortProj';

$route['insertPricecard'] = 'dashBoard/Admin/AdminDashboard/modeLinsertPricecard';
$route['updatePriceCard'] = 'dashBoard/Admin/AdminDashboard/modeLupdatePriceCard';

$route['update_resume'] = 'dashBoard/Admin/AdminDashboard/modeLupdateResume';





////// Delete function btn /////
$route['deleteService'] = 'dashBoard/Admin/AdminDashboard/deleteSection';
$route['removeSkills'] = 'dashBoard/Admin/AdminDashboard/modeLdeleteSkill';
$route['removeTestimonial'] = 'dashBoard/Admin/AdminDashboard/modeLremoveTestimonial';
$route['portfolioProjectRemove'] = 'dashBoard/Admin/AdminDashboard/modeLportfolioProjectRemove';
$route['deletePriceCard'] = 'dashBoard/Admin/AdminDashboard/modeLdeletePriceCard';



///================= Dashboard  controller model function call here   =================
