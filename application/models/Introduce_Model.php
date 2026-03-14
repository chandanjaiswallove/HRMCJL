<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Introduce_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_introude_update()
    {
        $id = $this->input->post('id');

        if (!$id) {
            sweetAlert('Error', 'Invalid Request', 'error', 'introduce');
            return;
        }

        $old = $this->db->where('id', $id)->get('introduce_directory')->row();

        $data = [
            'introduce_title'     => $this->input->post('introduceHeadings'),
            'introduce_highlight' => $this->input->post('hightlightTag'),
            'experience'          => $this->input->post('yearExperience'),
            'project_completed'   => $this->input->post('projectCompleted'),
            'introduce_paragraph' => $this->input->post('IntroduceMessage'),
        ];

        // ================= REMOVE FILE =================
        if ($this->input->post('remove_project_file') == '1') {
            if (!empty($old->project_download) && file_exists($old->project_download)) {
                unlink($old->project_download);
            }
            $data['project_download'] = NULL;
        }

        // ================= UPLOAD FILE =================
   // 🔹 UPLOAD FILE
if (!empty($_FILES['projectDownloads']['name'])) {

    $config['upload_path']   = 'uploads/projects/';
    $config['allowed_types'] = 'pdf|zip|rar|doc|docx';
    $config['max_size']      = 51200; // 50 MB (KB)
    $config['file_name']     = time().'_'.$_FILES['projectDownloads']['name'];

    // ⚠️ VERY IMPORTANT
    $this->load->library('upload');
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('projectDownloads')) {

        // 🔥 REAL ERROR
        $error = strip_tags($this->upload->display_errors());

        sweetAlert('Upload Error', $error, 'error', 'introduce');
        return;
    } else {
        $file = $this->upload->data();
        $data['project_download'] = 'uploads/projects/'.$file['file_name'];
    }
}


        $this->db->where('id', $id)->update('introduce_directory', $data);

        sweetAlert('Success', 'Introduce Updated Successfully', 'success', 'introduce');
    }
}
