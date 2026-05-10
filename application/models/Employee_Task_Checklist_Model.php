<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_Task_Checklist_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }




    // =========================================================
// AJAX TASK FETCH
// =========================================================
    // public function get_employee_taskschecklist_ajax($employee_id)
    // {
    //     // ================= ASSIGNED TASKS =================
    //     $tasks = $this->db
    //         ->where('employee_id', $employee_id)
    //         ->get('employee_task_master')
    //         ->result();

    //     // ================= TODAY CHECKLIST =================
    //     $today = date('Y-m-d');

    //     $checklist = $this->db
    //         ->where('employee_id', $employee_id)
    //         ->where('checklist_date', $today)
    //         ->get('employee_task_checklist')
    //         ->result();

    //     return [
    //         'tasks' => $tasks,
    //         'checklist' => $checklist
    //     ];
    // }


    // =========================================================
    // GET EMPLOYEE CHECKLIST
    // =========================================================
    public function get_employee_checklist($employee_id)
    {
        return $this->db
            ->where('employee_id', $employee_id)
            ->order_by('checklist_date', 'DESC')
            ->get('employee_task_checklist')
            ->result();
    }

    // =========================================================
    // INSERT DAILY TASK CHECKLIST
    // =========================================================
    public function insert_employee_task_checklist()
    {
        // ================= EMPLOYEE DETAILS =================
        $employee_id = $this->input->post('employee_id', TRUE);
        $employee_uid = $this->input->post('employee_uid', TRUE);
        $employee_name = $this->input->post('employee_name', TRUE);
        $department = $this->input->post('department', TRUE);
        $designation = $this->input->post('designation', TRUE);

        // ================= CHECKLIST DETAILS =================
        $checklist_date = $this->input->post('checklist_date', TRUE);
        $shift = $this->input->post('shift', TRUE);
        $area_section = $this->input->post('area_section', TRUE);

        // ================= TASK ARRAYS =================
        $tasks = $this->input->post('task_name');
        $task_statuses = $this->input->post('task_status');
        $task_remarks = $this->input->post('task_remark');

        // ================= FINAL REMARKS =================
        $cleaner_remark = $this->input->post('cleaner_remark', TRUE);
        $supervisor_remark = $this->input->post('supervisor_remark', TRUE);

        // ================= VALIDATION =================
        if (empty($employee_id) || empty($tasks)) {

            sweetAlert(
                'Error!',
                'Employee and tasks are required.',
                'error',
                base_url('employee_task_checklist')
            );

            return;
        }

        // ================= CHECK ALREADY EXISTS =================
        $exists = $this->db
            ->where([
                'employee_id' => $employee_id,
                'checklist_date' => $checklist_date
            ])
            ->count_all_results('employee_task_checklist');

        if ($exists > 0) {

            sweetAlert(
                'Already Done!',
                'Checklist already exists for selected date.',
                'warning',
                base_url('employee_task_checklist')
            );

            return;
        }






// ===============================
// CHECK EMPLOYEE ATTENDANCE
// ===============================
        $attendance = $this->db
            ->get_where('employee_attendance', [
                'employee_uid' => $this->input->post('employee_uid', true),
                'attendance_date' => $checklist_date
            ])
            ->row();


        // Employee attendance not found
        if (!$attendance) {

            sweetAlert(
                'Attendance Not Found!',
                'Please add attendance first.',
                'warning',
                base_url('employee_task_checklist')
            );

            return;
        }









        // ================= INSERT TASKS =================
        foreach ($tasks as $key => $task) {

            // Task Status
            $status = isset($task_statuses[$key])
                ? $task_statuses[$key]
                : 'Pending';

            // Task Remark
            $task_remark = isset($task_remarks[$key])
                ? $task_remarks[$key]
                : '';

            // Final Status
            $final_status = ($status == 'Done')
                ? 'Completed'
                : 'Pending';

            // Insert Array
            $insertData = array(

                // Employee
                'employee_id' => $employee_id,
                'employee_uid' => $employee_uid,
                'employee_name' => $employee_name,
                'department' => $department,
                'designation' => $designation,

                // Checklist
                'checklist_date' => $checklist_date,
                'shift' => $shift,
                'area_section' => $area_section,

                // Task
                'task_name' => trim($task),
                'task_status' => $status,
                'task_remark' => $task_remark,

                // Final Remarks
                'cleaner_remark' => $cleaner_remark,
                'supervisor_remark' => $supervisor_remark,

                // Status
                'final_status' => $final_status,

                // Time
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            );

            // Insert
            $this->db->insert(
                'employee_task_checklist',
                $insertData
            );
        }

        // ================= SUCCESS =================
        sweetAlert(
            'Success!',
            'Daily task checklist saved successfully.',
            'success',
            base_url('admin_playground')
        );
    }

    // =========================================================
    // GET CHECKLIST BY EMPLOYEE
    // =========================================================
    public function get_employee_task_checklist_by_employee($employee_id)
    {
        return $this->db
            ->where('employee_id', $employee_id)
            ->get('employee_task_checklist')
            ->result();
    }

    // =========================================================
    // UPDATE CHECKLIST
    // =========================================================
    public function update_employee_task_checklist()
    {
        $id = $this->input->post('id', TRUE);

        $task_status = $this->input->post('task_status', TRUE);
        $task_remark = $this->input->post('task_remark', TRUE);

        $cleaner_remark = $this->input->post('cleaner_remark', TRUE);
        $supervisor_remark = $this->input->post('supervisor_remark', TRUE);

        // UPDATE ONLY TASK ROW
        $updateData = array(
            'task_status' => $task_status,
            'task_remark' => $task_remark,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        $this->db->update('employee_task_checklist', $updateData);

        // OPTIONAL: update all rows of same date (group update)
        $row = $this->db->where('id', $id)
            ->get('employee_task_checklist')
            ->row();

        $this->db->where([
            'employee_id' => $row->employee_id,
            'checklist_date' => $row->checklist_date
        ])->update('employee_task_checklist', [
                    'shift' => $this->input->post('shift'),
                    'area_section' => $this->input->post('area_section'),
                    'cleaner_remark' => $cleaner_remark,
                    'supervisor_remark' => $supervisor_remark,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

        sweetAlert(
            'Updated!',
            'Checklist updated successfully.',
            'success',
            $_SERVER['HTTP_REFERER']
        );
    }

    // =========================================================
    // DELETE CHECKLIST
    // =========================================================
    public function delete_employee_task_checklist($id)
    {
        $this->db->where('id', $id);

        $delete = $this->db->delete(
            'employee_task_checklist'
        );

        if ($delete) {

            sweetAlert(
                'Deleted!',
                'Checklist deleted successfully.',
                'success',
                $_SERVER['HTTP_REFERER']
            );

        } else {

            sweetAlert(
                'Error!',
                'Delete failed.',
                'error',
                $_SERVER['HTTP_REFERER']
            );
        }
    }
}