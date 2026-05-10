<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_Payroll_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // =====================================================
    // AJAX LIVE PAYROLL DATA
    // =====================================================
    public function get_employee_payroll_data(
        $employee_uid,
        $salary_month,
        $salary_year
    ) {

        // ==========================================
        // CHECK ALREADY EXISTS
        // ==========================================
        $already = $this->db
            ->where('employee_uid', $employee_uid)
            ->where('salary_month', $salary_month)
            ->where('salary_year', $salary_year)
            ->get('employee_payroll')
            ->row();

        if ($already) {

            return [

                'status' => 'exists',

                'already_processed' => true,

                'message' =>
                    'Payroll already generated for this month'
            ];
        }

        // ==========================================
        // EMPLOYEE DETAILS
        // ==========================================
        $employee = $this->db
            ->where('student_uid', $employee_uid)
            ->get('student_directory')
            ->row();

        if (!$employee) {

            return [
                'status' => false
            ];
        }

        // ==========================================
        // MONTH NUMBER
        // ==========================================
        $month_number = date(
            'm',
            strtotime($salary_month)
        );

        // ==========================================
        // ATTENDANCE RECORDS
        // ==========================================
        $attendanceRecords = $this->db
            ->where('employee_uid', $employee_uid)
            ->where('MONTH(attendance_date)', $month_number)
            ->where('YEAR(attendance_date)', $salary_year)
            ->get('employee_attendance')
            ->result();

        $total_present = 0;

        $total_absent  = 0;

        $total_leave   = 0;

        foreach ($attendanceRecords as $attendance) {

            if ($attendance->attendance_status == 'Present') {

                $total_present++;
            }

            if ($attendance->attendance_status == 'Absent') {

                $total_absent++;
            }

            if ($attendance->attendance_status == 'Leave') {

                $total_leave++;
            }
        }

        // ==========================================
        // MONTHLY SALARY
        // ==========================================
        $monthly_salary =
            $employee->monthly_salary ?? 0;

        // ==========================================
        // DAYS IN MONTH
        // ==========================================
        $days_in_month = cal_days_in_month(
            CAL_GREGORIAN,
            $month_number,
            $salary_year
        );

        // ==========================================
        // PER DAY SALARY
        // ==========================================
        $per_day_salary = 0;

        if ($days_in_month > 0) {

            $per_day_salary =
                $monthly_salary / $days_in_month;
        }

        // ==========================================
        // PRESENT + LEAVE = PAID DAYS
        // ==========================================
        $paid_days =
            $total_present + $total_leave;

        // ==========================================
        // EARNED AMOUNT
        // ==========================================
        $earned_amount =
            $paid_days * $per_day_salary;

        // ==========================================
        // DEDUCTION
        // ==========================================
       $deduction_amount =
    $total_absent * $per_day_salary;

        // ==========================================
        // PREVIOUS PAYROLL
        // ==========================================
        $previousPayroll = $this->db
            ->where('employee_uid', $employee_uid)
            ->order_by('id', 'DESC')
            ->get('employee_payroll')
            ->row();

        $previous_due = 0;

        $previous_advance = 0;

        if ($previousPayroll) {

            $previous_due =
                $previousPayroll->due_amount ?? 0;

            $previous_advance =
                $previousPayroll->advance_amount ?? 0;
        }

        // ==========================================
        // FINAL PAYABLE
        // ==========================================
        $final_payable_salary =
            $earned_amount
            + $previous_due
            - $previous_advance;

        if ($final_payable_salary < 0) {

            $final_payable_salary = 0;
        }

        // ==========================================
        // RETURN RESPONSE
        // ==========================================
        return [

            'status' => true,

            'already_processed' => false,

            'gross_salary' =>
                round($monthly_salary),

            'earned_amount' =>
                round($earned_amount),

            'present_days' =>
                $total_present,

            'absent_days' =>
                $total_absent,

            'leave_days' =>
                $total_leave,

            'deduction_amount' =>
                round($deduction_amount),

            'previous_due' =>
                round($previous_due),

            'previous_advance' =>
                round($previous_advance),

        'advance_amount' => 0,

            'final_payable_salary' =>
                round($final_payable_salary)
        ];
    }

    // =====================================================
    // PROCESS PAYROLL
    // =====================================================
    public function process_payroll_employee()
    {

        $employee_uid =
            $this->input->post(
                'employee_uid',
                true
            );

        if (empty($employee_uid)) {

            sweetAlert(
                'Error!',
                'Employee UID Missing',
                'error',
                $_SERVER['HTTP_REFERER']
            );

            return;
        }

        // ==========================================
        // DUPLICATE CHECK
        // ==========================================
        $exists = $this->db
            ->where('employee_uid', $employee_uid)
            ->where(
                'salary_month',
                $this->input->post(
                    'salary_month',
                    true
                )
            )
            ->where(
                'salary_year',
                $this->input->post(
                    'salary_year',
                    true
                )
            )
            ->get('employee_payroll')
            ->row();

        if ($exists) {

            sweetAlert(
                'Warning!',
                'Payroll Already Exists For This Month',
                'warning',
                $_SERVER['HTTP_REFERER']
            );

            return;
        }

        // ==========================================
        // FINAL SALARY
        // ==========================================
        $final_salary =
            (float) $this->input->post(
                'final_payable_salary',
                true
            );

        // ==========================================
        // PAID AMOUNT
        // ==========================================
        $paid_amount =
            (float) $this->input->post(
                'paid_amount',
                true
            );

        // ==========================================
        // DUE + ADVANCE
        // ==========================================
        $due_amount = 0;

        $advance_amount = 0;

        if ($paid_amount < $final_salary) {

            $due_amount =
                $final_salary - $paid_amount;
        }

        if ($paid_amount > $final_salary) {

            $advance_amount =
                $paid_amount - $final_salary;
        }

        // ==========================================
        // EXTRA SAFETY
        // ==========================================
        if ($due_amount < 0) {

            $due_amount = 0;
        }

        if ($advance_amount < 0) {

            $advance_amount = 0;
        }

        // ==========================================
        // INSERT DATA
        // ==========================================
        $data = [

            'employee_uid' =>
                $employee_uid,

            'employee_name' =>
                $this->input->post(
                    'employee_name',
                    true
                ),

            'department' =>
                $this->input->post(
                    'department',
                    true
                ),

            'designation' =>
                $this->input->post(
                    'designation',
                    true
                ),

            'salary_month' =>
                $this->input->post(
                    'salary_month',
                    true
                ),

            'salary_year' =>
                $this->input->post(
                    'salary_year',
                    true
                ),

            'gross_salary' =>
                $this->input->post(
                    'gross_salary',
                    true
                ),

            'earned_amount' =>
                $this->input->post(
                    'earned_amount',
                    true
                ),

            'present_days' =>
                $this->input->post(
                    'present_days',
                    true
                ),

            'absent_days' =>
                $this->input->post(
                    'absent_days',
                    true
                ),

            'leave_days' =>
                $this->input->post(
                    'leave_days',
                    true
                ),

            'deduction_amount' =>
                $this->input->post(
                    'deduction_amount',
                    true
                ),

            'paid_amount' =>
                $paid_amount,

            'due_amount' =>
                $due_amount,

            'advance_amount' =>
                $advance_amount,

            'previous_due' =>
                $this->input->post(
                    'previous_due',
                    true
                ),

            'previous_advance' =>
                $this->input->post(
                    'previous_advance',
                    true
                ),

            'final_payable_salary' =>
                $final_salary,

            'payment_mode' =>
                $this->input->post(
                    'payment_mode',
                    true
                ),

            'payment_date' =>
                $this->input->post(
                    'payment_date',
                    true
                ),

            'remarks' =>
                $this->input->post(
                    'remarks',
                    true
                ),

            'created_at' =>
                date('Y-m-d H:i:s'),

            'updated_at' =>
                null
        ];

        // ==========================================
        // INSERT QUERY
        // ==========================================
        $insert = $this->db
            ->insert(
                'employee_payroll',
                $data
            );

        // ==========================================
        // RESPONSE
        // ==========================================
        if ($insert) {

            sweetAlert(
                'Success!',
                'Payroll Saved Successfully',
                'success',
                $_SERVER['HTTP_REFERER']
            );

        } else {

            sweetAlert(
                'Error!',
                'Failed To Save Payroll',
                'error',
                $_SERVER['HTTP_REFERER']
            );
        }
    }

    // =====================================================
    // UPDATE PAYROLL
    // =====================================================
    public function update_payroll_employee()
    {

        $id = $this->input->post(
            'id',
            true
        );

        if (empty($id)) {

            sweetAlert(
                'Error!',
                'Payroll ID Missing',
                'error',
                $_SERVER['HTTP_REFERER']
            );

            return;
        }

        // ==========================================
        // OLD PAYROLL
        // ==========================================
        $oldPayroll = $this->db
            ->where('id', $id)
            ->get('employee_payroll')
            ->row();

        $final_salary =
            $oldPayroll->final_payable_salary ?? 0;

        $paid_amount =
            (float) $this->input->post(
                'paid_amount',
                true
            );

        // ==========================================
        // DUE + ADVANCE
        // ==========================================
        $due_amount = 0;

        $advance_amount = 0;

        if ($paid_amount < $final_salary) {

            $due_amount =
                $final_salary - $paid_amount;
        }

        if ($paid_amount > $final_salary) {

            $advance_amount =
                $paid_amount - $final_salary;
        }

        // ==========================================
        // EXTRA SAFETY
        // ==========================================
        if ($due_amount < 0) {

            $due_amount = 0;
        }

        if ($advance_amount < 0) {

            $advance_amount = 0;
        }

        // ==========================================
        // UPDATE DATA
        // ==========================================
        $data = [

            'paid_amount' =>
                $paid_amount,

            'due_amount' =>
                $due_amount,

            'advance_amount' =>
                $advance_amount,

            'payment_mode' =>
                $this->input->post(
                    'payment_mode',
                    true
                ),

            'payment_date' =>
                $this->input->post(
                    'payment_date',
                    true
                ),

            'remarks' =>
                $this->input->post(
                    'remarks',
                    true
                ),

            'updated_at' =>
                date('Y-m-d H:i:s')
        ];

        // ==========================================
        // UPDATE QUERY
        // ==========================================
        $update = $this->db
            ->where('id', $id)
            ->update(
                'employee_payroll',
                $data
            );

        // ==========================================
        // RESPONSE
        // ==========================================
        if ($update) {

            sweetAlert(
                'Success!',
                'Payroll Updated Successfully',
                'success',
                $_SERVER['HTTP_REFERER']
            );

        } else {

            sweetAlert(
                'Error!',
                'Failed To Update Payroll',
                'error',
                $_SERVER['HTTP_REFERER']
            );
        }
    }
}