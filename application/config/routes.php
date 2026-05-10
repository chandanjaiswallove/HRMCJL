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
$route['employee_dashboard'] = 'dashBoard/Admin/AdminDashboard/loaDemployee_dashboard';


$route['employee_attendance'] = 'dashBoard/Admin/AdminDashboard/loaDemployee_attendance';

$route['save_employee_attendance'] = 'dashBoard/Admin/AdminDashboard/save_employee_attendance';

$route['update_employee_attendance'] = 'dashBoard/Admin/AdminDashboard/update_employee_attendance';

$route['delete_employee_attendance/(:num)'] = 'dashBoard/Admin/AdminDashboard/delete_employee_attendance/$1';

//----------------------------------------------------------------------------------------------------------------

$route['employee_attendance_records'] = 'dashBoard/Admin/AdminDashboard/loaDemployee_attendance_records';



// =================EMPLOYEE TASK MASTER ROUTES =================

// Page
$route['employee_task_master'] = 'dashBoard/Admin/AdminDashboard/loaDemployee_task_master';

// Insert / Update
$route['insert_employee_task_master'] = 'dashBoard/Admin/AdminDashboard/insert_employee_task_master';

// Delete
$route['delete_employee_task_master/(:num)'] = 'dashBoard/Admin/AdminDashboard/delete_employee_task_master/$1';

// AJAX Fetch
$route['get_employee_tasks_ajax/(:num)'] = 'dashBoard/Admin/AdminDashboard/get_employee_tasks_ajax/$1';



//-------------------------------------------------------------------------------------


//--------------------------------------------------------------------------------------



// =================EMPLOYEE TASK CHEKLIST ROUTES =================

// Page Load
$route['employee_task_checklist'] = 'dashBoard/Admin/AdminDashboard/loaDemployee_task_checklist';

$route['get_employee_tasks_ajax/(:num)'] =
'dashBoard/Admin/AdminDashboard/get_employee_tasks_ajax/$1';


// Insert
$route['insert_employee_task_checklist'] = 'dashBoard/Admin/AdminDashboard/insert_employee_task_checklist';

// Update
$route['update_employee_task_checklist'] = 'dashBoard/Admin/AdminDashboard/update_employee_task_checklist';

// Delete
$route['delete_employee_task_checklist/(:num)'] = 'dashBoard/Admin/AdminDashboard/delete_employee_task_checklist/$1';



// ================= EMPLOYEE CHECKLIST =================
$route['employee_checklist_records'] = 'dashBoard/Admin/AdminDashboard/loaDemployee_checklist_records';

// ================= EMPLOYEE CHECKLIST =================
$route['employee_payroll'] = 'dashBoard/Admin/AdminDashboard/loaDemployee_payroll';


// =====================================================
// PAYROLL ROUTES
// =====================================================

$route['ajax_get_employee_payroll_data'] = 'dashBoard/Admin/Payroll_Controller/ajax_get_employee_payroll_data';


$route['process_payroll_employee'] = 'dashBoard/Admin/Payroll_Controller/process_payroll_employee';


$route['update_payroll_employee'] = 'dashBoard/Admin/Payroll_Controller/update_payroll_employee';






// ----------------------------------------------------------------------------------- ENROLL STUDENTS PAGE ALL WORK HERE
$route['enroll_students'] = 'dashBoard/Admin/AdminDashboard/loaDenroll_students';  // LOAD STUDENTS ENROLL PAGE
$route['enroll_student_insert_basic'] = 'dashBoard/Admin/AdminDashboard/loaDenroll_student_insert';


// --------------------------------------------------------------------------------------- MANAGE STUDENTS PAGE ALL WORK HERE
$route['manage_students'] = 'dashBoard/Admin/AdminDashboard/loaDmanage_students';

$route['enroll_student_update'] = 'dashBoard/Admin/AdminDashboard/loaDenroll_student_update';
$route['enrllStudentDataDelete'] = 'dashBoard/Admin/AdminDashboard/loaDenroll_student_delete';


















$route['profile_card'] = 'dashBoard/Admin/AdminDashboard/loaDprofile_card';

$route['visitors'] = 'dashBoard/Admin/AdminDashboard/loadvisitor_data';


///================= Dashboard  controller end =================


///================= Dashboard  controller model function call here   =================
$route['update_profile'] = 'dashBoard/Admin/AdminDashboard/modeLupdate_profile';    /// Card_Model




///================= Dashboard  controller model function call here   =================
