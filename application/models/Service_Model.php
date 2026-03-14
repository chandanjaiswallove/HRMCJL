<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_insert_service()
    {
        // ================= FILE UPLOAD CONFIG =================
        $config['upload_path'] = 'uploads/services/';   // service images ka folder
        $config['allowed_types'] = 'jpg|jpeg|png|webp|svg';
        $config['max_size'] = 5120; // 5 MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $service_icon = null;

        // ================= IMAGE UPLOAD =================
        if (!empty($_FILES['service_icon']['name'])) {
            if (!$this->upload->do_upload('service_icon')) {
                // ❌ Upload failed
                sweetAlert(
                    'Upload Failed',
                    strip_tags($this->upload->display_errors()),
                    'error',
                    'services'
                );
                return;
            }

            $uploadData = $this->upload->data();
            $service_icon = 'uploads/services/' . $uploadData['file_name'];
        }

        // ================= INSERT DATA =================
        $data = [
            'heading' => $this->input->post('service_title', true),
            'description' => $this->input->post('service_paragraph', true),
            'projects_count' => $this->input->post('service_project_count', true),
            'service_icon' => $service_icon,
            'updated_date' => date('Y-m-d H:i:s')
        ];

        // ================= DB INSERT =================
        if ($this->db->insert('services_directory', $data)) {
            // ✅ Success
            sweetAlert(
                'Success',
                'Service added successfully',
                'success',
                'services'
            );
        } else {
            // ❌ DB insert failed
            sweetAlert(
                'Error',
                'Database insert failed',
                'error',
                'services'
            );
        }
    }




    public function service_update()
    {
        // ================= GET ID =================
        $id = $this->input->post('id');

        // ================= FETCH OLD DATA =================
        $old = $this->db
            ->where('id', $id)
            ->get('services_directory')
            ->row();

        if (!$old) {
            sweetAlert('Error', 'Service not found', 'error', 'services');
            return;
        }

        // ================= UPLOAD CONFIG =================
        $config['upload_path'] = './uploads/services/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp|svg';
        $config['max_size'] = 5120; // 5 MB
        $config['encrypt_name'] = TRUE;

        // Make sure folder exists
        if (!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0755, true);

        $this->load->library('upload');
        $this->upload->initialize($config);

        // ================= DEFAULT OLD ICON =================
        $service_icon = $old->service_icon;
        $remove_icon = $this->input->post('remove_icon'); // hidden input from form

        // ==================================================
        // CASE 1️⃣ : USER CLICKED REMOVE (×)
        // ==================================================
        if ($remove_icon == '1') {
            if (!empty($old->service_icon) && file_exists(FCPATH . $old->service_icon)) {
                unlink(FCPATH . $old->service_icon);
            }
            $service_icon = null; // remove from DB
        }

        // ==================================================
        // CASE 2️⃣ : USER UPLOADED NEW ICON
        // ==================================================
        if (!empty($_FILES['service_icon']['name'])) {

            if (!$this->upload->do_upload('service_icon')) {
                sweetAlert(
                    'Upload Failed',
                    strip_tags($this->upload->display_errors()),
                    'error',
                    'services'
                );
                return;
            }

            // old icon delete
            if (!empty($old->service_icon) && file_exists(FCPATH . $old->service_icon)) {
                unlink(FCPATH . $old->service_icon);
            }

            $uploadData = $this->upload->data();
            $service_icon = 'uploads/services/' . $uploadData['file_name'];
        }

        // ================= UPDATE DATA =================
        $data = [
            'heading' => $this->input->post('service_title', true),
            'description' => $this->input->post('service_paragraph', true),
            'projects_count' => $this->input->post('service_project_count', true),
            'service_icon' => $service_icon,
            'updated_date' => date('Y-m-d H:i:s')
        ];

        // ================= DB UPDATE =================
        $this->db->where('id', $id);

        if ($this->db->update('services_directory', $data)) {
            sweetAlert('Success', 'Service updated successfully', 'success', 'services');
        } else {
            sweetAlert('Error', 'Update failed', 'error', 'services');
        }
    }


    ////// Delete function btn /////

    public function deleteBtn()
    {
        $userId = $_GET['id'];

        if ($this->db->query("DELETE FROM services_directory WHERE id = '$userId'")) {
            sweetAlert('Success', 'Service updated successfully', 'success', 'services');
        } else {
            sweetAlert('Error', 'Update failed', 'error', 'services');
        }

    }


}



