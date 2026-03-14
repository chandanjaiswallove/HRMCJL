<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OnBoarding_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   
    public function registerStudent()
{
    $email            = trim($this->input->post('email'));
    $user_id          = trim($this->input->post('user_id'));
    $password         = (string) $this->input->post('password');
    $confirm_password = (string) $this->input->post('confirm_password');

    // ================= PASSWORD MISMATCH =================
    if ($password !== $confirm_password) {
        return 'password_mismatch';
    }

    // ================= ONLY ONE USER CHECK =================
    $totalUsers = $this->db->count_all('register_directory');

    if ($totalUsers >= 1) {
        return 'single_user_only';
    }

    // ================= INSERT =================
    $data = [
        'user_id'    => $user_id,
        'email'      => $email,
        'password'   => password_hash($password, PASSWORD_BCRYPT),
        'status'     => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];

    return $this->db->insert('register_directory', $data)
        ? 'success'
        : 'failed';
}



    //=============== Login Student with Set Session ============///

   public function loginStudent()
{
    $user_id  = trim($this->input->post('user_id'));
    $email    = trim($this->input->post('email'));
    $password = (string) $this->input->post('password');

    // ================= GET SINGLE USER =================
    $user = $this->db
        ->where('user_id', $user_id)
        ->where('email', $email)
        ->get('register_directory')
        ->row();

    if (!$user) {
        return 'invalid_credentials';
    }

    // ================= PASSWORD VERIFY =================
    if (!password_verify($password, $user->password)) {
        return 'wrong_password';
    }

    // ================= SUCCESS =================
    return [
        'status' => 'success',
        'user'   => $user
    ];
}




}