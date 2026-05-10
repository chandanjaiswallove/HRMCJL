<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_Task_Master_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_assigned_employees()
    {
        $this->db->select('
        employee_id,
        MAX(employee_name) as employee_name,
        MAX(employee_uid) as employee_uid,
        MAX(department) as department,
        MAX(designation) as designation
    ');

        $this->db->from('employee_task_master');
        $this->db->group_by('employee_id');

        return $this->db->get()->result();
    }

    // =========================================================
    // INSERT / UPDATE EMPLOYEE TASK MASTER
    // =========================================================
    public function insert_employee_task_master()
    {
        // ================= INPUT =================
        $employee_id = $this->input->post('employee_id', TRUE);
        $employee_uid = $this->input->post('employee_uid', TRUE);
        $employee_name = $this->input->post('employee_name', TRUE);
        $department = $this->input->post('department', TRUE);
        $designation = $this->input->post('designation', TRUE);
        $tasks = $this->input->post('task_name', TRUE);

        // ================= VALIDATION =================
        if (empty($employee_id) || empty($employee_uid) || empty($employee_name) || empty($tasks)) {

            sweetAlert(
                'Error!',
                'Employee details and tasks are required.',
                'error',
                base_url('employee_task_master')
            );
        }

        // ================= DELETE OLD TASKS =================
        $this->db->where('employee_id', $employee_id);
        $this->db->delete('employee_task_master');

        // ================= INSERT NEW TASKS =================
        foreach ($tasks as $task) {

            $task = trim($task);

            if (!empty($task)) {

                $insertData = array(
                    'employee_id' => $employee_id,
                    'employee_uid' => $employee_uid,
                    'employee_name' => $employee_name,
                    'department' => $department,
                    'designation' => $designation,
                    'task_name' => $task,
                    'task_status' => 'Active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );

                $this->db->insert('employee_task_master', $insertData);
            }
        }

        // ================= SUCCESS =================
        sweetAlert(
            'Success!',
            'Employee tasks saved successfully.',
            'success',
            base_url('employee_task_master')
        );
    }

    public function get_employee_by_id($employee_id)
    {
        $this->db->where('employee_id', $employee_id);
        $this->db->group_by('employee_id');
        return $this->db->get('employee_task_master')->row();
    }

    // =========================================================
    // GET ALL EMPLOYEE TASKS
    // // =========================================================
    public function get_all_employee_tasks()
    {
        $this->db->select('*');
        $this->db->from('employee_task_master');
        $this->db->order_by('employee_name', 'ASC');

        return $this->db->get()->result();
    }


    // =========================================================
    // GET TASKS BY EMPLOYEE ID
    // =========================================================
    public function get_tasks_by_employee($employee_id)
    {
        $this->db->where('employee_id', $employee_id);
        $this->db->where('task_status', 'Active');

        return $this->db->get('employee_task_master')->result();
    }





    // =========================================================
    // DELETE EMPLOYEE TASKS
    // =========================================================
    public function delete_employee_task_master($employee_id)
    {
        $this->db->where('employee_id', $employee_id);
        $delete = $this->db->delete('employee_task_master');

        if ($delete) {

            sweetAlert(
                'Deleted!',
                'Employee task list deleted successfully.',
                'success',
                base_url('employee_task_master')
            );

        } else {

            sweetAlert(
                'Error!',
                'Unable to delete employee task list.',
                'error',
                base_url('employee_task_master')
            );
        }
    }


    // =========================================================
    // AJAX FETCH EMPLOYEE TASKS
    // =========================================================
    public function get_employee_tasks_ajax($employee_id)
    {
        $tasks = $this->get_tasks_by_employee($employee_id);

        header('Content-Type: application/json');

        echo json_encode($tasks);

        exit;
    }

}