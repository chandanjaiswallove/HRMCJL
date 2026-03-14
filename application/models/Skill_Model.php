<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_skill_update()
    {
        // ================= FILE UPLOAD CONFIG =================
        $config['upload_path'] = 'uploads/skill/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp|svg';
        $config['max_size'] = 5120; // 5 MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        $skill_logo = null;

        // ================= IMAGE UPLOAD =================
        if (!empty($_FILES['skill_logo']['name'])) {

            if (!$this->upload->do_upload('skill_logo')) {

                sweetAlert(
                    'Upload Failed',
                    strip_tags($this->upload->display_errors()),
                    'error',
                    'my_skill'
                );
                return;
            }

            $uploadData = $this->upload->data();
            $skill_logo = 'uploads/skill/' . $uploadData['file_name'];
        }

        // ================= INSERT DATA =================
        $data = [
            'skill_name' => $this->input->post('skill_title', true),
            'skill_percentage' => $this->input->post('skill_progress', true),
            'skill_logo' => $skill_logo,
            'skill_updated_date' => date('Y-m-d H:i:s')
        ];

        // ================= DB INSERT =================
        if ($this->db->insert('myskill_directory', $data)) {

            sweetAlert(
                'Success',
                'Skill added successfully',
                'success',
                'my_skill'
            );

        } else {

            sweetAlert(
                'Error',
                'Database insert failed',
                'error',
                'my_skill'
            );
        }
    }


    ///// myskill fetch and update //////

    public function skill_update()
    {
        // ================= GET ID =================
        $id = $this->input->post('logo_id');

        // ================= FETCH OLD DATA =================
        $old = $this->db
            ->where('id', $id)
            ->get('myskill_directory')
            ->row();

        if (!$old) {
            sweetAlert('Error', 'Skill not found', 'error', 'skill');
            return;
        }

        // ================= UPLOAD CONFIG =================
        $config['upload_path'] = './uploads/skill/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp|svg';
        $config['max_size'] = 5120; // 5 MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        // ================= DEFAULT OLD LOGO =================
        $skill_logo = $old->skill_logo;
        $remove_logo = $this->input->post('remove_logo'); // from hidden input

        // ==================================================
        // CASE 1️⃣ : USER CLICKED REMOVE (×)
        // ==================================================
        if ($remove_logo == '1') {

            if (!empty($old->skill_logo) && file_exists(FCPATH . $old->skill_logo)) {
                unlink(FCPATH . $old->skill_logo);
            }

            $skill_logo = null; // DB me bhi remove
        }

        // ==================================================
        // CASE 2️⃣ : USER UPLOADED NEW IMAGE
        // ==================================================
        if (!empty($_FILES['skill_logo']['name'])) {

            if (!$this->upload->do_upload('skill_logo')) {
                sweetAlert(
                    'Upload Failed',
                    strip_tags($this->upload->display_errors()),
                    'error',
                    'my_skill'
                );
                return;
            }

            // old image delete
            if (!empty($old->skill_logo) && file_exists(FCPATH . $old->skill_logo)) {
                unlink(FCPATH . $old->skill_logo);
            }

            $uploadData = $this->upload->data();
            $skill_logo = 'uploads/skill/' . $uploadData['file_name'];
        }

        // ================= UPDATE DATA =================
        $data = [
            'skill_name' => $this->input->post('skill_title', true),
            'skill_percentage' => $this->input->post('skill_progress', true),
            'skill_logo' => $skill_logo,
            'skill_updated_date' => date('Y-m-d H:i:s')
        ];

        // ================= DB UPDATE =================
        $this->db->where('id', $id);

        if ($this->db->update('myskill_directory', $data)) {
            sweetAlert('Success', 'Skill updated successfully', 'success', 'my_skill');
        } else {
            sweetAlert('Error', 'Update failed', 'error', 'my_skill');
        }
    }


    public function deleteSkill()
    {
        $userId = $_GET['id'];

        if ($this->db->query("DELETE FROM myskill_directory WHERE id = '$userId'")) {
            sweetAlert('success', 'Delete Successfully', 'success', 'my_skill');
        } else {
            sweetAlert('Failed', 'Failed', 'error', 'my_skill');
        }

    }


}
