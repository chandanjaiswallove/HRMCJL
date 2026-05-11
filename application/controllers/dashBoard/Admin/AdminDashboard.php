<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Card_Model $Card
 * @property Dashboard_Model $Dash
 * @property Contact_Model $Contact
 * @property Student_Enroll_Model $EnrollStudent
 * @property Employee_Attendance_Model $Employee
 * @property Employee_Task_Master_Model $TaskMaster
 * @property Employee_Payroll_Model $EmployeePayroll
 * @property Employee_Task_Checklist_Model $TaskChecklist


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
        $this->load->model('Contact_Model', 'Contact');
        $this->load->model('Student_Enroll_Model', 'EnrollStudent');
        $this->load->model('Employee_Attendance_Model', 'Employee');
        $this->load->model('Employee_Task_Master_Model', 'TaskMaster');
        $this->load->model('Employee_Payroll_Model', 'EmployeePayroll');
        $this->load->model('Employee_Task_Checklist_Model', 'TaskChecklist');




    }



    // Generic page loader
    private function load_page($page, $data = [])
    {


        $data['card'] = $this->Card->get_card(); // Header/footer ke liye data Profile_card ka Data
        $data['contacts'] = $this->Dash->get_contact_directory();   // get_contact_directory Data from Dashboard_Model
        $data['notifications'] = $this->Dash->get_notifications();
        $data['notification_count'] = $this->Dash->count_new_messages();

        $data['registered'] = $this->Dash->get_registeredUserData();  // Registered user data for profile card page

        // Admin Dashboard for Report

        $data['students'] = $this->EnrollStudent->get_enroll_studentData();
        $data['total_students'] = $this->EnrollStudent->count_students();
        $data['active_students'] = $this->EnrollStudent->get_active_students_count();
        $data['inactive_students'] = $this->EnrollStudent->get_inactive_students_count();
        $data['total_monthly_salary'] = $this->EnrollStudent->total_monthly_salary();
        $data['current_month_paid'] = $this->EnrollStudent->current_month_paid();
        $data['current_month_due'] = $this->EnrollStudent->current_month_due();
        $data['total_annual_salary'] = $this->EnrollStudent->total_annual_salary();
        $data['total_annual_paid'] = $this->EnrollStudent->total_annual_paid();
        $data['total_annual_due'] = $this->EnrollStudent->total_annual_due();
        $data['total_advance_paid'] = $this->EnrollStudent->total_advance_paid();
        $data['monthly_deduction'] = $this->EnrollStudent->monthly_deduction();
        $data['annual_deduction'] = $this->EnrollStudent->annual_deduction();
        $data['total_present_days'] = $this->EnrollStudent->total_present_days();
        $data['total_absent_days'] = $this->EnrollStudent->total_absent_days();
        $data['total_leave_days'] = $this->EnrollStudent->total_leave_days();

        $data['attendance'] = $this->Employee->get_all_attendance();   // coming from Employee_Attendance_Model & this get_all_attendance() 

        $data['assigned_employee'] = $this->TaskMaster->get_assigned_employees();   //

        // $data['checklists'] = $this->TaskChecklist->get_all_employee_task_checklist();   //

        $this->load->view('dashboard/admin/layouts/dashHeader', $data);

        // Page content
        $this->load->view('dashboard/admin/pages/' . $page, $data);

        // Footer
        $this->load->view('dashboard/admin/layouts/dashFooter', $data);

    }





    //-------------------------------------------- Start Employee Payroll Page all work here
    public function loaDemployee_payslip()
    {
        $employee_uid = $this->input->get('employee_uid');

        $query = $this->db->query("
        SELECT * 
        FROM employee_payroll
        WHERE employee_uid = '$employee_uid'
    ");

        $data['payroll'] = $query->row();

        $this->load_page('employee_payslip', $data);
    }















    // // // ==========================================
    // // // AJAX TASK FETCH
    // // ==========================================
    public function get_employee_tasks_ajax($employee_id)
    {
        $this->TaskMaster->get_employee_tasks_ajax($employee_id);
    }









    public function loaDemployee_checklist_records()
    {
        $this->load_page('employee_checklist_records');
    }




    // =====================================================
// PAGE LOAD
// =====================================================
    public function loaDemployee_task_checklist()
    {
        $this->load_page('employee_task_checklist');
    }


    // =====================================================
// AJAX TASK FETCH
// =====================================================
// public function get_employee_tasks_ajax($employee_id)
// {
//     $data = $this->TaskChecklist
//         ->get_employee_tasks_ajax($employee_id);

    //     echo json_encode($data);
// }



    // =====================================================
// INSERT CHECKLIST
// =====================================================
    public function insert_employee_task_checklist()
    {
        $this->TaskChecklist->insert_employee_task_checklist();
    }


    // =====================================================
// UPDATE CHECKLIST
// =====================================================
    public function update_employee_task_checklist()
    {
        $this->TaskChecklist->update_employee_task_checklist();
    }


    // =====================================================
// DELETE CHECKLIST
// =====================================================
    public function delete_employee_task_checklist($id)
    {
        $this->TaskChecklist->delete_employee_task_checklist($id);
    }










    // ==========================================
    // EMPLOYEE TASK MASTER PAGE LOAD
    // ==========================================
    public function loaDemployee_task_master()
    {
        $this->load_page('employee_task_master');
    }


    // ==========================================
    // INSERT / UPDATE TASKS
    // ==========================================
    public function insert_employee_task_master()
    {
        $this->TaskMaster->insert_employee_task_master();
    }


    // ==========================================
    // DELETE TASKS
    // ==========================================
    public function delete_employee_task_master($employee_id)
    {
        $this->TaskMaster->delete_employee_task_master($employee_id);
    }










    /// ------------------------------------- Employee_Attendance_Record Page all work here

    public function loaDemployee_attendance_records()
    {
        $this->load_page('employee_attendance_records');
    }





















    /// ------------------------------------- employee_attendance Page all work here

    // ==========================================
// ADMIN DASHBOARD CONTROLLER FUNCTIONS
// ==========================================

    // Employee Attendance Page Load
    public function loaDemployee_attendance()
    {
        $this->load_page('employee_attendance');
    }

    // Save Attendance
    public function save_employee_attendance()
    {
        $this->Employee->save_attendance();
    }

    // Update Attendance
    public function update_employee_attendance()
    {

        $this->Employee->update_employee_attendance();

    }

    // Delete Attendance
    public function delete_employee_attendance($id)
    {
        if (!empty($id)) {
            $this->Employee->delete_attendance($id);
        } else {
            sweetAlert(
                'Error!',
                'Invalid attendance record.',
                'error',
                base_url('employee_attendance')
            );
        }
    }



























    public function loaDemployee_dashboard()
    {
        $this->load_page('employee_dashboard');
    }














    /// ------------------------------------- Start Enroll Students Page all work here
    public function loaDenroll_students()
    {
        $this->load_page('enroll_students');
    }















    public function loaDenroll_student_insert()
    {
        $this->EnrollStudent->enroll_student_insert();
    }


    /// ------------------------------------- Start Student Manage page alll work here
    public function loaDmanage_students()
    {
        $this->load_page('manage_students');
    }

    public function loaDenroll_student_update()
    {
        $this->EnrollStudent->enroll_student_update();
    }

    public function loaDenroll_student_delete()
    {
        $this->EnrollStudent->enroll_student_delete();
    }










    //-------------------------------------------- Start Admin Dashboard Page all work here
    public function loaDadmin_dashboard()
    {
        $this->load_page('admin_playground');
    }


    //-------------------------------------------- Start Profile card page all work here 
    public function loaDprofile_card()
    {
        $this->load_page('profile_card');
    }

    public function modeLupdate_profile()   // Card Model Function
    {
        $this->Card->save_profile_card();
    }

    //-------------------------------------------- Start Visitor data page all work here 
    public function loadvisitor_data()
    {
        $this->Dash->mark_all_read();  // Model function call
        $this->load_page('visitor_data');
    }











}