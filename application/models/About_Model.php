<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_about_Update()
    {
        $id = $this->input->post('id');

        // Safety check
        if (empty($id)) {
            sweetAlert(
                'Invalid Request',
                'ID missing',
                'error',
                'about'
            );
            return;
        }

        $data = [
            'about_title'        => $this->input->post('aboutHeadings'),
            'title_highlights'   => $this->input->post('aboutTag'),
            'about_paragraph'    => $this->input->post('IntroduceMessage'),
            'about_updated_date' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $update = $this->db->update('about_directory', $data);

        if ($update) {
            sweetAlert(
                'Updated!',
                'About section updated successfully',
                'success',
                'about'
            );
        } else {
            sweetAlert(
                'Failed!',
                'Update failed, try again',
                'error',
                'about'
            );
        }
    }
}
