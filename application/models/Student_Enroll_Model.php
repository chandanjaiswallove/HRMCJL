<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_Enroll_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// date_default_timezone_set('Asia/kolkata');

	public function enroll_student_update()
	{
		$id = $this->input->post('enroll_student_id', true);

		// 👉 Old data fetch (image ke liye)
		$oldData = $this->db->get_where('student_directory', ['id' => $id])->row();

		$avatarName = $oldData->student_avatar; // default old image

		// ================= REMOVE IMAGE =================
		if ($this->input->post('remove_avatar') == "1") {

			if (!empty($oldData->student_avatar) && file_exists('./uploads/services/' . $oldData->student_avatar)) {
				unlink('./uploads/services/' . $oldData->student_avatar);
			}

			$avatarName = "";
		}

		// ================= UPLOAD CONFIG =================
		$config['upload_path'] = './uploads/services/';
		$config['allowed_types'] = 'jpg|jpeg|png|webp';
		$config['max_size'] = 2048; // 2MB
		$config['file_ext_tolower'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config['detect_mime'] = TRUE;
		$config['mod_mime_fix'] = TRUE;

		$this->load->library('upload', $config);

		// ================= IMAGE UPLOAD =================
		if (!empty($_FILES['student_avatar']['name'])) {

			if ($this->upload->do_upload('student_avatar')) {

				$uploadData = $this->upload->data();
				$avatarName = $uploadData['file_name'];

				// 👉 Old image delete (replace case)
				if (!empty($oldData->student_avatar) && file_exists('./uploads/services/' . $oldData->student_avatar)) {
					unlink('./uploads/services/' . $oldData->student_avatar);
				}

			} else {
				echo $this->upload->display_errors();
				exit;
			}
		}

		// ================= MAIN DATA =================
		$student_data = [
			'student_name' => $this->input->post('student_name', true),
			'student_email' => $this->input->post('studenTemail', true),
			'student_contact' => $this->input->post('mobile', true),
			'student_uid' => $this->input->post('student_uid', true),
			'student_aadhar' => $this->input->post('aadhar_id', true),
			'student_aapaar' => $this->input->post('aapar_id', true),
			'monthly_salary' => $this->input->post('aapar_id', true),
			'student_blood_group' => $this->input->post('blood_group', true),
			'student_gender' => $this->input->post('gender', true),
			'student_dob' => $this->input->post('student_dob', true),
			'student_father_name' => $this->input->post('father_name', true),
			'permanent_address' => $this->input->post('permanent_address', true),
			'correspondance_address' => $this->input->post('second_address', true),
			'father_contact_no' => $this->input->post('father_mobile', true),
			'enrolled_class_section' => $this->input->post('class_section', true),
			'enrollment_year' => $this->input->post('session_year', true),
			'joining_date' => $this->input->post('admission_date', true),
			'db_enrollment_update' => date('Y-m-d h:i:s A'),
			'student_profile_status' => $this->input->post('student_profile_status'),

			// 👉 IMAGE COLUMN
			'student_avatar' => $avatarName
		];

		// ================= UPDATE =================
		$result = $this->db->where('id', $id)->update('student_directory', $student_data);

		if ($result) {
			sweetAlert('Success', 'Update Successfully', 'success', 'manage_students');
		} else {
			sweetAlert('Failed', 'Update Failed', 'error', 'manage_students');
		}
	}









	public function enroll_student_delete()
	{
		$id = $this->input->post('studentEnrollId', true);

		$row = $this->db
			->where('id', $id)
			->get('student_directory')
			->row();


		if ($row && !empty($row->student_avatar)) {
			$file_path = '/uploads/services/' . $row->student_avatar;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}

		$delete = $this->db->where('id', $id)->delete('student_directory');

		if ($delete) {
			sweetAlert(
				'Success',
				'Delete Successfullly',
				'success',
				'manage_students'
			);
		} else {
			sweetAlert(
				'Failed',
				'Delete Failed',
				'error',
				'manage_students'
			);
		}

	}



	// ==========================================
	// GET ALL STUDENTS
	// ==========================================
	public function get_enroll_studentData()
	{
		$query = $this->db
			->order_by('id', 'DESC')
			->get('student_directory')
			->result();

		return $query;
	}

	// ==========================================
	// TOTAL STUDENTS
	// ==========================================
	public function count_students()
	{
		return $this->db
			->count_all('student_directory');
	}

	// ==========================================
	// ACTIVE STUDENTS
	// ==========================================
	public function get_active_students_count()
	{
		return $this->db
			->where('student_profile_status', 'Active')
			->count_all_results('student_directory');
	}

	// ==========================================
	// INACTIVE STUDENTS
	// ==========================================
	public function get_inactive_students_count()
	{
		return $this->db
			->where('student_profile_status', 'Inactive')
			->count_all_results('student_directory');
	}

	// ==========================================
	// TOTAL MONTHLY FEES / SALARY
	// ==========================================
	public function total_monthly_salary()
	{
		return $this->db
			->select_sum('monthly_salary')
			->get('student_directory')
			->row()
			->monthly_salary;
	}

// MODEL FUNCTION

public function current_month_paid()
{
    return $this->db
        ->select_sum('paid_amount')
        ->where('salary_month', date('F'))
        ->where('salary_year', date('Y'))
        ->get('employee_payroll')
        ->row()
        ->paid_amount ?? 0;
}

// MODEL FUNCTION

public function current_month_due()
{
    return $this->db
        ->select_sum('due_amount')
        ->where('salary_month', date('F'))
        ->where('salary_year', date('Y'))
        ->get('employee_payroll')
        ->row()
        ->due_amount ?? 0;
}

// MODEL FUNCTION

public function total_annual_salary()
{
    $monthly_salary = $this->db
        ->select_sum('monthly_salary')
        ->get('student_directory')
        ->row()
        ->monthly_salary ?? 0;

    return $monthly_salary * 12;
}


// MODEL FUNCTION

public function total_annual_paid()
{
    return $this->db
        ->select_sum('paid_amount')
        ->where('salary_year', date('Y'))
        ->get('employee_payroll')
        ->row()
        ->paid_amount ?? 0;
}

// MODEL FUNCTION

public function total_annual_due()
{
    return $this->db
        ->select_sum('due_amount')
        ->where('salary_year', date('Y'))
        ->get('employee_payroll')
        ->row()
        ->due_amount ?? 0;
}


// MODEL FUNCTION

public function total_advance_paid()
{
    return $this->db
        ->select_sum('advance_amount')
        ->where('salary_year', date('Y'))
        ->get('employee_payroll')
        ->row()
        ->advance_amount ?? 0;
}

public function monthly_deduction()
{
    return $this->db
        ->select_sum('deduction_amount')
        ->where('salary_month', date('F'))
        ->where('salary_year', date('Y'))
        ->get('employee_payroll')
        ->row()
        ->deduction_amount ?? 0;
}

// MODEL FUNCTION

public function annual_deduction()
{
    return $this->db
        ->select_sum('deduction_amount')
        ->where('salary_year', date('Y'))
        ->get('employee_payroll')
        ->row()
        ->deduction_amount ?? 0;
}

// MODEL FUNCTION

public function total_present_days()
{
    return $this->db
        ->where('attendance_status', 'Present')
        ->count_all_results('employee_attendance');
}

// MODEL FUNCTION

public function total_absent_days()
{
    return $this->db
        ->where('attendance_status', 'Absent')
        ->count_all_results('employee_attendance');
}

// MODEL FUNCTION

public function total_leave_days()
{
    return $this->db
        ->where('attendance_status', 'Leave')
        ->count_all_results('employee_attendance');
}




///--------------------------------- all admin dashbord related model functions are here for report ---------------------------------///



	public function enroll_student_insert()
	{

		$enrollStudentData = [
			'student_name' => $this->input->post('student_name', true),
			'joining_date' => $this->input->post('admission_date', true),
			'student_email' => $this->input->post('student_email', true),
			'student_uid' => $this->input->post('student_uid', true),
			'db_enrollment_update' => date('Y-m-d H:i:s A')
		];


		if ($this->db->insert('student_directory', $enrollStudentData)) {
			sweetAlert(
				'Success',
				'Enroll Successfully',
				'success',
				'enroll_students'
			);
		} else {
			sweetAlert(
				'Failed',
				'Enroll Failed',
				'error',
				'enroll_students'
			);
		}

	}

}