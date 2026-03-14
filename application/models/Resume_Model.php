<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

public function updateResume()
{
    $education = $this->input->post('education');

    if (!$education) {
        sweetAlert('Error','No data received','error',base_url('resume'));
        return;
    }

    $this->db->trans_start();

    // old data delete
    $this->db->empty_table('education_blocks');
    $this->db->empty_table('education_items');

    foreach ($education as $block) {

        if (empty($block['date'])) continue;

        // insert block
        $this->db->insert('education_blocks', [
            'date' => $block['date']
        ]);

        $block_id = $this->db->insert_id();

        // insert items
        if (!empty($block['title'])) {

            foreach ($block['title'] as $key => $title) {

                $desc = isset($block['desc'][$key]) ? $block['desc'][$key] : '';

                // agar dono empty ho to skip
                if (trim($title) == '' && trim($desc) == '') continue;

                $this->db->insert('education_items', [
                    'block_id' => $block_id,
                    'title' => $title,
                    'description' => $desc
                ]);
            }
        }
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
        sweetAlert('Error','Something went wrong','error',base_url('resume'));
    } else {
        sweetAlert('Success','Resume updated successfully','success',base_url('resume'));
    }
}


}
