<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Employee_Payroll_Model $EmployeePayroll
 */
class Payroll_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // ==========================================
        // SESSION CHECK
        // ==========================================
        if (!$this->session->userdata('logged_in')) {

            redirect('onBoarding');
            exit;
        }

        // ==========================================
        // CACHE DISABLE
        // ==========================================
        $this->output
            ->set_header("Cache-Control: no-store, no-cache, must-revalidate");

        $this->output
            ->set_header("Pragma: no-cache");

        // ==========================================
        // LOAD MODEL
        // ==========================================
        $this->load->model(
            'Employee_Payroll_Model',
            'EmployeePayroll'
        );
    }

    // =====================================================
    // AJAX LIVE PAYROLL DATA
    // =====================================================
    public function ajax_get_employee_payroll_data()
    {

        $employee_uid = $this->input->post(
            'employee_uid',
            true
        );

        $salary_month = $this->input->post(
            'salary_month',
            true
        );

        $salary_year = $this->input->post(
            'salary_year',
            true
        );

        $data = $this->EmployeePayroll
            ->get_employee_payroll_data(
                $employee_uid,
                $salary_month,
                $salary_year
            );

        echo json_encode($data);
    }

    // =====================================================
    // PROCESS PAYROLL
    // =====================================================
    public function process_payroll_employee()
    {

        $this->EmployeePayroll
            ->process_payroll_employee();
    }

    // =====================================================
    // UPDATE PAYROLL
    // =====================================================
    public function update_payroll_employee()
    {

        $this->EmployeePayroll
            ->update_payroll_employee();
    }
}