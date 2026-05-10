<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{



    public function __construct()
    {
        parent::__construct();
    }




    // Register User Get Data 
    public function get_registeredUserData()
    {
        $query = $this->db
            ->order_by('id', 'DESC')
            ->limit(1)
            ->get('register_directory');

        return $query->num_rows() ? $query->row() : null;
    }





    //     ============================================================
// ✅ get all contact list (table page ke liye)
// ============================================================
    public function get_contact_directory()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get('contact_directory')
            ->result();
    }

    public function count_new_messages()
    {
        return $this->db
            ->where('is_read', 0)
            ->count_all_results('contact_directory');
    }

    public function get_notifications()
    {
        return $this->db
            ->where('is_read', 0)
            ->order_by('id', 'DESC')
            ->limit(5)
            ->get('contact_directory')
            ->result();
    }

    // Dashboard_model.php
    public function mark_all_read()
    {
        $this->db->set('is_read', 1);
        $this->db->where('is_read', 0);
        $this->db->update('contact_directory');
    }








}
