<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_Attendance_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // ===============================
    // INSERT ATTENDANCE
    // ===============================
    public function save_attendance()
    {
        $employee_id = $this->input->post('employee_id', true);
        $attendance_date = $this->input->post('attendance_date', true);


        // ===============================
// FETCH EMPLOYEE JOINING DATE
// ===============================
        $before = $this->db
            ->get_where('student_directory', ['student_uid' => $this->input->post('employee_uid', true)])
            ->row();


        // Student check
        if (!$before) {

            sweetAlert(
                'Employee Not Found!',
                'Invalid employee selected.',
                'error',
                base_url('employee_attendance')
            );

            return;
        }


        // Joining Date
        $joining_date = $before->joining_date;


        // ===============================
// CHECK ATTENDANCE DATE
// ===============================
        if (
            !empty($joining_date) &&
            strtotime($attendance_date) < strtotime($joining_date)
        ) {

            sweetAlert(
                'Invalid Attendance!',
                'Attendance cannot be added before joining date.',
                'warning',
                base_url('employee_attendance')
            );

            return;
        }


        // Duplicate check
        $this->db->where('employee_id', $employee_id);
        $this->db->where('attendance_date', $attendance_date);
        $check = $this->db->get('employee_attendance');

        if ($check->num_rows() > 0) {
            sweetAlert(
                'Duplicate Attendance!',
                'Attendance already exists for this employee on selected date.',
                'warning',
                base_url('employee_attendance')
            );
        }



        $data = [
            'employee_id' => $employee_id,
            'employee_name' => $this->input->post('employee_name', true),
            'employee_uid' => $this->input->post('employee_uid', true),
            'department' => $this->input->post('department', true),
            'designation' => $this->input->post('designation', true),
            'attendance_date' => $attendance_date,
            'check_in_time' => $this->input->post('check_in_time', true),
            'check_out_time' => $this->input->post('check_out_time', true),
            'attendance_status' => $this->input->post('attendance_status', true),
            'remarks' => $this->input->post('remarks', true),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $insert = $this->db->insert('employee_attendance', $data);

        if ($insert) {
            sweetAlert(
                'Success!',
                'Employee attendance added successfully.',
                'success',
                base_url('employee_attendance')
            );
        } else {
            sweetAlert(
                'Error!',
                'Failed to save attendance.',
                'error',
                base_url('employee_attendance')
            );
        }
    }

    // ===============================
    // GET ALL ATTENDANCE
    // ===============================
    public function get_all_attendance()
    {
        $this->db->select('
        employee_attendance.*,

        student_directory.student_name,
        student_directory.student_uid,
        student_directory.student_avatar,
        student_directory.enrolled_class_section,
        student_directory.enrollment_year
    ');

        $this->db->from('employee_attendance');

        // Proper join by employee UID
        $this->db->join(
            'student_directory',
            'student_directory.student_uid = employee_attendance.employee_uid',
            'left'
        );

        $this->db->order_by('employee_attendance.id', 'DESC');

        return $this->db->get()->result();
    }

    // ===============================
    // GET SINGLE ATTENDANCE
    // ===============================
    public function get_attendance_by_id($id)
    {
        return $this->db->get_where(
            'employee_attendance',
            ['id' => (int) $id]
        )->row();
    }

    // ===============================
    // UPDATE ATTENDANCE
    // ===============================
    public function update_employee_attendance()
    {

        $attendance_id = $this->input->post('attendance_id', true);

        // $employee_uid = $this->input->post('employee_uid', true);



        // Employee master details fetch again
        // $employee = $this->db
        //     ->get_where('student_directory', ['student_uid' => $employee_uid])
        //     ->row();

        $data = [

            'attendance_date' => $this->input->post('attendance_date', true),
            'check_in_time' => $this->input->post('check_in_time', true),
            'check_out_time' => $this->input->post('check_out_time', true),
            'attendance_status' => $this->input->post('attendance_status', true),
            'remarks' => $this->input->post('remarks', true),
            'updated_at' => date('Y-m-d H:i:s')

        ];

        $this->db->where('id', $attendance_id);
        $update = $this->db->update('employee_attendance', $data);

        if ($update) {
            sweetAlert(
                'Updated!',
                'Attendance updated successfully.',
                'success',
                $_SERVER['HTTP_REFERER']
            );
        } else {
            sweetAlert(
                'Error!',
                'Failed to update attendance.',
                'error',
                $_SERVER['HTTP_REFERER']
            );
        }
    }

    // ===============================
    // DELETE ATTENDANCE
    // ===============================
    public function delete_attendance($id)
    {
        if ($this->db->delete('employee_attendance', ['id' => (int) $id])) {
            sweetAlert(
                'Deleted!',
                'Attendance deleted successfully.',
                'success',
                $_SERVER['HTTP_REFERER']
            );
        } else {
            sweetAlert(
                'Error!',
                'Failed to delete attendance.',
                'error',
                $_SERVER['HTTP_REFERER']
            );
        }
    }
}