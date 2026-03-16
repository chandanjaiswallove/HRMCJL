<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{



    // ============================================================
// ✅ get all education blocks with items
// ============================================================
    public function get_educationData()
    {
        $blocks = $this->db
            ->order_by('id', 'ASC') // block order
            ->get('education_blocks')
            ->result();

        foreach ($blocks as $block) {
            $block->items = $this->db
                ->where('block_id', $block->id)
                ->order_by('id', 'ASC') // pair order
                ->get('education_items')
                ->result();
        }

        return $blocks;
    }



    // ============================================================
    // ✅ get all data from pricing_card and  pricing_items
    // ============================================================
    public function get_price_card()
    {
        // Get pricing cards
        $cards = $this->db
            ->order_by('id', 'ASC')
            ->get('pricing_card')
            ->result();

        if (!$cards) {
            return [];
        }

        // Attach items
        foreach ($cards as $card) {
            $card->items = $this->db
                ->where('pricing_id', $card->id)
                ->get('pricing_items')
                ->result();
        }

        return $cards;
    }

    // ============================================================
    // ✅ get all portfolio projects with tags
    // ============================================================
    public function get_portfolio_projects()
    {
        $projects = $this->db
            ->order_by('id', 'DESC')
            ->get('portfolio_projects')
            ->result();

        foreach ($projects as $project) {
            $project->tags = $this->db
                ->where('project_id', $project->id)
                ->get('portfolio_tags')
                ->result();
        }

        return $projects;
    }





    // ============================================================
    // ✅ get all data from introduce_directory 
    // ============================================================
    public function get_introduceData()
    {
        $query = $this->db
            ->order_by('id', 'DESC')   // latest record
            ->limit(1)                 // sirf ek
            ->get('introduce_directory');

        return $query->num_rows() ? $query->row() : null;
    }

    // ============================================================
    // ✅ get latest data from about_directory
    // ============================================================
    public function get_aboutData()
    {
        return $this->db
            ->order_by('id', 'ASC')
            ->limit(1)
            ->get('about_directory')
            ->row();
    }

    // ============================================================
    // ✅ get latest data from services_directory
    // ============================================================
    public function get_serviceData()
    {
        return $this->db
            ->order_by('id', 'ASC')
            ->get('services_directory')
            ->result();
    }

    // ============================================================
    // ✅ get all data from myskill_directory
    // ============================================================
    public function get_myskill_directory()
    {
        return $this->db
            ->order_by('id', 'ASC')
            ->get('myskill_directory')
            ->result();   // ✅ MULTIPLE ROWS
    }

    // ============================================================
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


    // ============================================================
    // ✅ get all data from testimonial_directory
    // ============================================================    
    public function get_testimonial_directory()
    {
        return $this->db
            ->order_by('id', 'ASC')
            ->get('testimonial_directory')
            ->result();
    }







}
