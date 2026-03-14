<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }



    ////    edit and fetch /////
    // Update testimonial
public function update_Testimonials()
{
    // ================= GET ID =================
    $id = $this->input->post('editTestId');

    // ================= FETCH OLD DATA =================
    $old = $this->db
        ->where('id', $id)
        ->get('testimonial_directory')
        ->row();

    if (!$old) {
        sweetAlert('Error', 'Testimonial not found', 'error', 'testimonials');
        return;
    }

    // ================= UPLOAD CONFIG =================
    $config['upload_path'] = './uploads/testimonials/';
    $config['allowed_types'] = 'jpg|jpeg|png|webp';
    $config['max_size'] = 2048; // 2 MB
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload');
    $this->upload->initialize($config);

    // ================= DEFAULT OLD PHOTO =================
    $profile_photo = $old->profile_photo;
    $remove_photo = $this->input->post('rProfilephoto'); // here

    // ==================================================
    // CASE 1️⃣ : USER CLICKED REMOVE (×)
    // ==================================================
    if ($remove_photo == '1') {

        if (!empty($old->profile_photo) && file_exists(FCPATH . $old->profile_photo)) {
            unlink(FCPATH . $old->profile_photo);
        }

        $profile_photo = null; // DB me bhi remove
    }

    // ==================================================
    // CASE 2️⃣ : USER UPLOADED NEW IMAGE
    // ==================================================
    if (!empty($_FILES['profile_photo']['name'])) {

        if (!$this->upload->do_upload('profile_photo')) {
            sweetAlert(
                'Upload Failed',
                strip_tags($this->upload->display_errors()),
                'error',
                'testimonials'
            );
            return;
        }

        // old image delete
        if (!empty($old->profile_photo) && file_exists(FCPATH . $old->profile_photo)) {
            unlink(FCPATH . $old->profile_photo);
        }

        $uploadData = $this->upload->data();
        $profile_photo = 'uploads/testimonials/' . $uploadData['file_name'];
    }

    // ================= UPDATE DATA =================
    $data = [
        'profile_name'        => $this->input->post('profile_name', true),
        'company_name'        => $this->input->post('company_name', true),
        'client_project_name' => $this->input->post('client_project_name', true),
        'client_review'       => $this->input->post('client_review', true),
        'profile_photo'       => $profile_photo,
        'updated_at'          => date('Y-m-d H:i:s')
    ];

    // ================= DB UPDATE =================
    $this->db->where('id', $id);

    if ($this->db->update('testimonial_directory', $data)) {
        sweetAlert('Success', 'Testimonial updated successfully', 'success', 'testimonials');
    } else {
        sweetAlert('Error', 'Update failed', 'error', 'testimonials');
    }
}








    ///// Testimonail Insert ///////////
    public function insertTestimonial()
    {
        // ================= FORM DATA =================
        $profile_name = $this->input->post('profile_name', true);
        $company_name = $this->input->post('company_name', true);
        $client_project_name = $this->input->post('client_project_name', true);
        $client_review = $this->input->post('client_review', true);

        // ================= IMAGE DEFAULT =================
        $profile_photo = null;

        // ================= UPLOAD CONFIG =================
        if (!empty($_FILES['profile_photo']['name'])) {

            $upload_path = 'uploads/testimonials/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, true);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 5120; // 5MB
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload');
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

            $uploadData = $this->upload->data();
            $profile_photo = 'uploads/testimonials/' . $uploadData['file_name'];
        }

        // ================= INSERT DATA =================
        $data = [
            'testimonial_date' => date('Y-m-d H:i:s'),
            'profile_name' => $profile_name,
            'profile_photo' => $profile_photo,
            'company_name' => $company_name,
            'client_project_name' => $client_project_name,
            'client_review' => $client_review
        ];

        // ================= DB INSERT =================
        if ($this->db->insert('testimonial_directory', $data)) {

            sweetAlert(
                'Success',
                'Testimonial added successfully',
                'success',
                'testimonials'
            );

        } else {

            // image cleanup if DB failed
            if ($profile_photo && file_exists(FCPATH . $profile_photo)) {
                unlink(FCPATH . $profile_photo);
            }

            sweetAlert(
                'Error',
                'Testimonial insert failed',
                'error',
                'testimonials'
            );
        }
    }








    //// Testimonials Company Logo Insert ////////

    public function uploadCompanyLogoImage()
    {
        $logoImagePath = null;

        if (!empty($_FILES['company_logo']['name'])) {

            $logoUploadDirectory = FCPATH . 'uploads/testimonials/';

            if (!is_dir($logoUploadDirectory)) {
                mkdir($logoUploadDirectory, 0755, true);
            }

            $uploadSettings = [
                'upload_path' => $logoUploadDirectory,
                'allowed_types' => 'jpg|jpeg|png|webp',
                'max_size' => 5120,
                'encrypt_name' => TRUE
            ];

            $this->load->library('upload', $uploadSettings);
            $this->upload->initialize($uploadSettings, TRUE);

            if (!$this->upload->do_upload('company_logo')) {

                sweetAlert(
                    'Upload Failed',
                    $this->upload->display_errors('', ''),
                    'error',
                    'testimonials'
                );
                return;
            }

            // Upload successful
            $uploadedFileData = $this->upload->data();

            // Relative path for DB
            $logoImagePath = 'uploads/testimonials/' . $uploadedFileData['file_name'];

            // ================= DB INSERT =================
            $insertData = [
                'company_logo' => $logoImagePath,
                'date' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('company_logo_directory', $insertData);
            // =============================================

            sweetAlert(
                'Success',
                'Company logo uploaded successfully',
                'success',
                'testimonials'
            );
            return;
        }

        sweetAlert(
            'Error',
            'No image selected',
            'error',
            'testimonials'
        );
    }


    ////    Testimonials Company Logo Update    ////

    public function updateCompanyLogoImage()
    {
        /* =====================================================
        1️⃣ Logo ID & Remove Flag lena (form ke hidden inputs)
        ===================================================== */
        $logoId = $this->input->post('logo_id');
        $removeLogo = $this->input->post('remove_logo'); // 0 ya 1

        if (!$logoId) {
            sweetAlert('Error', 'Invalid logo ID', 'error', 'testimonials');
            return;
        }

        /* =====================================================
        2️⃣ Database se OLD image ka path nikalna
        ===================================================== */
        $oldData = $this->db
            ->select('company_logo')
            ->where('id', $logoId)
            ->get('company_logo_directory')
            ->row();

        if (!$oldData) {
            sweetAlert('Error', 'Record not found', 'error', 'testimonials');
            return;
        }

        $oldImagePath = $oldData->company_logo; // example: uploads/testimonials/old.webp


        /* =====================================================
        3️⃣ CASE 1: User ne NEW image select ki hai
        - old delete
        - new upload
        - DB update
        ===================================================== */
        if (!empty($_FILES['company_logo']['name'])) {

            // ===== Upload Folder =====
            $uploadPath = FCPATH . 'uploads/testimonials/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // ===== Upload Config =====
            $config = [
                'upload_path' => $uploadPath,
                'allowed_types' => 'jpg|jpeg|png|webp',
                'max_size' => 5120,
                'encrypt_name' => true
            ];

            $this->load->library('upload');
            $this->upload->initialize($config);

            // ===== Upload Attempt =====
            if (!$this->upload->do_upload('company_logo')) {
                sweetAlert(
                    'Upload Failed',
                    $this->upload->display_errors('', ''),
                    'error',
                    'testimonials'
                );
                return;
            }

            // ===== New Image Data =====
            $uploadData = $this->upload->data();
            $newImagePath = 'uploads/testimonials/' . $uploadData['file_name'];

            // ===== OLD image delete (folder se) =====
            if (!empty($oldImagePath) && file_exists(FCPATH . $oldImagePath)) {
                unlink(FCPATH . $oldImagePath);
            }

            // ===== Database Update =====
            $this->db->where('id', $logoId);
            $this->db->update('company_logo_directory', [
                'company_logo' => $newImagePath,
                'date' => date('Y-m-d H:i:s')
            ]);

            sweetAlert(
                'Success',
                'Company logo updated successfully',
                'success',
                'testimonials'
            );
            return;
        }


        /* =====================================================
        4️⃣ CASE 2: New image nahi di
        BUT remove (×) click kiya
        - sirf OLD image delete
        - DB empty
        ===================================================== */
        if ($removeLogo == 1) {

            // Folder se old image delete
            if (!empty($oldImagePath) && file_exists(FCPATH . $oldImagePath)) {
                unlink(FCPATH . $oldImagePath);
            }

            // Database update (logo empty)
            $this->db->where('id', $logoId);
            $this->db->update('company_logo_directory', [
                'company_logo' => null,
                'date' => date('Y-m-d H:i:s')
            ]);

            sweetAlert(
                'Success',
                'Company logo removed successfully',
                'success',
                'testimonials'
            );
            return;
        }


        /* =====================================================
        5️⃣ CASE 3: Kuch bhi nahi kiya
        - no upload
        - no remove
        ===================================================== */
        sweetAlert(
            'Info',
            'No changes made',
            'info',
            'testimonials'
        );
    }



    public function removeTestimonial()     //// Remove Testimonial Remove Testional function for delete
    {
        $userId = $_GET['id'];

        if ($this->db->query("DELETE FROM testimonial_directory WHERE id = '$userId'")) {
            sweetAlert('Success', 'Delete Successfully', 'success', 'testimonials');
        } else {
            sweetAlert('Failed', 'Failed', 'error', 'testimonials');
        }
    }


    public function testimonialremoveLogo()     //// Remove Testimonial Company Logo Delete
    {
        $logoId = $_GET['id'];

        if ($this->db->query("DELETE FROM company_logo_directory WHERE id = '$logoId'")) {
            sweetAlert('Success', 'Delete Successfully', 'success', 'testimonials');
        } else {
            sweetAlert('Failed', 'Failed', 'error', 'testimonials');
        }
    }

}