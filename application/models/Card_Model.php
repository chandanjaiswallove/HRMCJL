<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card_Model extends CI_Model
{


    // ============================================================
    // ✅ get all data from card_directory 
    // ============================================================
    public function get_card()
    {
        $query = $this->db
            ->order_by('id', 'DESC')   // latest record
            ->limit(1)                 // sirf ek
            ->get('card_directory');

        return $query->num_rows() ? $query->row() : null;
    }


    // ===================== Profile Card Data Model ===================///


    // ===================== Profile Card Data Model ===================///
public function save_profile_card()
{
    // ================= FORM DATA =================
    $data = [
        'company_name'     => $this->input->post('company_name', true),
        'web_title'        => $this->input->post('web_title', true),
        'person_name'      => $this->input->post('full_name', true),

        'social_one'       => $this->input->post('facebook_link', true),
        'social_two'       => $this->input->post('twitter_link', true),
        'social_three'     => $this->input->post('github_link', true),
        'social_four'      => $this->input->post('linkedin_link', true),
        'social_five'      => $this->input->post('instagram_link', true),

        'address'          => $this->input->post('address', true),
        'whatsapp_contact' => $this->input->post('whatsapp_Number', true),
        'email'            => $this->input->post('email_address', true),
        'whatsapp_message' => $this->input->post('WhatsappMessage', true),
    ];

    // ================= OLD DATA =================
    $old = $this->db->limit(1)->get('card_directory')->row();
    // ================= IMAGE REMOVE LOGIC =================
$removeMap = [
    'remove_company_icon'      => 'web_icon',
    'remove_profile_photo'     => 'profile_photo',
    'remove_company_logo'      => 'company_logo',
    'remove_company_dark_logo' => 'company_dark_logo',
];

foreach ($removeMap as $removeInput => $dbField) {

    if ($this->input->post($removeInput) == '1' && $old && !empty($old->$dbField)) {

        $filePath = FCPATH . $old->$dbField;

        if (file_exists($filePath)) {
            unlink($filePath); // file delete
        }

        // DB se image hata do
        $data[$dbField] = null;
    }
}


    // ================= IMAGE CONFIG =================
    $images = [
        'company_icon' => 'web_icon',
        'profile_photo' => 'profile_photo',
        'company_logo' => 'company_logo',
        'company_dark_logo' => 'company_dark_logo',
    ];

    $this->load->library('upload');

    foreach ($images as $input => $dbField) {

        if (!empty($_FILES[$input]['name'])) {

            $uploadPath = FCPATH . 'uploads/profile/';

            // ensure folder exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

$config = [
    'upload_path'      => $uploadPath,
    'allowed_types'    => '*',
    'max_size'         => 5120,
    'remove_spaces'    => TRUE,
    'file_ext_tolower' => TRUE,
    'file_name'        => uniqid($input . '_', true),
];


            $this->upload->initialize($config);

            if ($this->upload->do_upload($input)) {

                // ❌ delete old image
                if ($old && !empty($old->{$dbField}) && file_exists($uploadPath . $old->{$dbField})) {
                    unlink($uploadPath . $old->{$dbField});
                }

                $up = $this->upload->data();
                $data[$dbField] = 'uploads/profile/' . $up['file_name'];

            } else {
                return sweetAlert(
                    'Upload Failed!',
                    strip_tags($this->upload->display_errors()),
                    'error',
                    base_url('profile_card')
                );
            }
        }
    }

    // ================= INSERT / UPDATE =================
    if ($old) {
        $this->db->where('id', $old->id)->update('card_directory', $data);

        return sweetAlert(
            'Success!',
            'Profile updated successfully 🎉',
            'success',
            base_url('profile_card')
        );
    } else {
        $this->db->insert('card_directory', $data);

        return sweetAlert(
            'Success!',
            'Profile created successfully 🎉',
            'success',
            base_url('profile_card')
        );
    }
}


        // ===================== Profile Card Data Model ===================///
        // ================= INSERT / UPDATE PROFILE =================
   







        // ===================== Profile Card Data Model ===================///





}