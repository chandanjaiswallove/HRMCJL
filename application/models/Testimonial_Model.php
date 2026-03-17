<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Update testimonial
    public function update_Testimonials()
    {
        $id = $this->input->post('editTestId');

        $old = $this->db
            ->where('id', $id)
            ->get('testimonial_directory')
            ->row();

        if (!$old) {
            sweetAlert('Error', 'Testimonial not found', 'error', 'testimonials');
            return;
        }

        $config['upload_path'] = './uploads/testimonials/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload');

        // ================= PROFILE PHOTO =================

        $profile_photo = $old->profile_photo;

        if ($this->input->post('rProfilephoto') == '1') {

            if (!empty($old->profile_photo) && file_exists(FCPATH . $old->profile_photo)) {
                unlink(FCPATH . $old->profile_photo);
            }

            $profile_photo = null;
        }

        if (!empty($_FILES['profile_photo']['name'])) {

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('profile_photo')) {

                sweetAlert(
                    'Upload Failed',
                    strip_tags($this->upload->display_errors()),
                    'error',
                    'testimonials'
                );
                return;
            }

            if (!empty($old->profile_photo) && file_exists(FCPATH . $old->profile_photo)) {
                unlink(FCPATH . $old->profile_photo);
            }

            $uploadData = $this->upload->data();
            $profile_photo = 'uploads/testimonials/' . $uploadData['file_name'];
        }

        // ================= COMPANY LOGO =================

        $company_logo = $old->company_logo;

        if ($this->input->post('rCompanyLogo') == '1') {

            if (!empty($old->company_logo) && file_exists(FCPATH . $old->company_logo)) {
                unlink(FCPATH . $old->company_logo);
            }

            $company_logo = null;
        }

        if (!empty($_FILES['company_logo']['name'])) {

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('company_logo')) {

                sweetAlert(
                    'Upload Failed',
                    strip_tags($this->upload->display_errors()),
                    'error',
                    'testimonials'
                );
                return;
            }

            if (!empty($old->company_logo) && file_exists(FCPATH . $old->company_logo)) {
                unlink(FCPATH . $old->company_logo);
            }

            $uploadData = $this->upload->data();
            $company_logo = 'uploads/testimonials/' . $uploadData['file_name'];
        }

        // ================= UPDATE DATA =================

        $data = [
            'profile_name' => $this->input->post('profile_name', true),
            'company_name' => $this->input->post('company_name', true),
            'client_project_name' => $this->input->post('client_project_name', true),
            'client_review' => $this->input->post('client_review', true),
            'profile_photo' => $profile_photo,
            'company_logo' => $company_logo,
            'status' => $this->input->post('status'), // approve / pending
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);

        if ($this->db->update('testimonial_directory', $data)) {

            sweetAlert('Success', 'Testimonial updated successfully', 'success', 'testimonials');

        } else {

            sweetAlert('Error', 'Update failed', 'error', 'testimonials');

        }
    }







    public function approve_Testimonial()
    {
        $id = $this->input->get('id');

        if (!$id) {

            sweetAlert(
                'Error',
                'Invalid Testimonial ID',
                'error',
                'testimonials'
            );

            return;
        }

        $this->db->where('id', $id);

        if ($this->db->update('testimonial_directory', ['status' => 'approved'])) {

            sweetAlert(
                'Success',
                'Testimonial approved successfully',
                'success',
                'testimonials'
            );

        } else {

            sweetAlert(
                'Error',
                'Approve failed',
                'error',
                'testimonials'
            );

        }
    }










    // ================= Delete function for testimonal client review  =================

    public function removeTestimonial()
    {
        $userId = $this->input->get('id');

        // Old record fetch
        $old = $this->db->where('id', $userId)
            ->get('testimonial_directory')
            ->row();

        if (!$old) {
            sweetAlert('Error', 'Testimonial not found', 'error', 'testimonials');
            return;
        }

        // Delete profile photo
        if (!empty($old->profile_photo) && file_exists(FCPATH . $old->profile_photo)) {
            unlink(FCPATH . $old->profile_photo);
        }

        // Delete company logo
        if (!empty($old->company_logo) && file_exists(FCPATH . $old->company_logo)) {
            unlink(FCPATH . $old->company_logo);
        }

        // Delete record
        $this->db->where('id', $userId);

        if ($this->db->delete('testimonial_directory')) {
            sweetAlert('Success', 'Delete Successfully', 'success', 'testimonials');
        } else {
            sweetAlert('Failed', 'Delete Failed', 'error', 'testimonials');
        }
    }





}