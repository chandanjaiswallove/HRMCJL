<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortfolioProject_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function updatePortProj()
    {
        $projectId = (int) $this->input->post('Project_id');

        // ---------------- VALIDATION ----------------
        if (!$projectId) {
            sweetAlert('Error', 'Invalid project ID', 'error', base_url('projects'));
            return;
        }

        // ---------------- FETCH OLD PROJECT ----------------
        $oldProject = $this->db
            ->where('id', $projectId)
            ->get('portfolio_projects')
            ->row();

        if (!$oldProject) {
            sweetAlert('Error', 'Project not found', 'error', base_url('projects'));
            return;
        }

        // ---------------- BASIC UPDATE DATA ----------------
        $updateData = [
            'project_title' => $this->input->post('project_title', true),
            'project_link' => $this->input->post('project_link', true),
        ];

        // =====================================================
        // 🟥 CASE 1: IMAGE REMOVE BUTTON CLICKED
        // =====================================================
        if ($this->input->post('remove_full_image') == '1') {

            if (!empty($oldProject->full_image)) {
                $oldPath = FCPATH . $oldProject->full_image;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // DB me image NULL
            $updateData['full_image'] = NULL;
        }

        // =====================================================
        // 🟩 CASE 2: NEW IMAGE UPLOADED
        // (Ye remove case ko override karega)
        // =====================================================
        if (!empty($_FILES['full_project_image']['name'])) {

            // Upload folder check
            $uploadPath = FCPATH . 'uploads/portproject/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $config = [
                'upload_path' => $uploadPath,
                'allowed_types' => 'jpg|jpeg|png|webp',
                'max_size' => 5120, // 5 MB
                'encrypt_name' => true
            ];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('full_project_image')) {
                sweetAlert(
                    'Upload Failed',
                    strip_tags($this->upload->display_errors()),
                    'error',
                    base_url('projects')
                );
                return;
            }

            // Old image delete
            if (!empty($oldProject->full_image)) {
                $oldPath = FCPATH . $oldProject->full_image;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $uploadData = $this->upload->data();
            $updateData['full_image'] = 'uploads/portproject/' . $uploadData['file_name'];
        }

        // ---------------- UPDATE PROJECT ----------------
        $this->db->where('id', $projectId)->update('portfolio_projects', $updateData);

        // =====================================================
        // 🏷 TAGS UPDATE (DELETE → INSERT)
        // =====================================================
        $this->db->where('project_id', $projectId)->delete('portfolio_tags');

        $tags = $this->input->post('project_tags');

        if (is_array($tags)) {
            foreach ($tags as $tag) {
                $tag = trim($tag);
                if ($tag !== '') {
                    $this->db->insert('portfolio_tags', [
                        'project_id' => $projectId,
                        'project_tags' => $tag,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        // ---------------- SUCCESS ----------------
        sweetAlert(
            'Updated!',
            'Portfolio project updated successfully',
            'success',
            base_url('projects')
        );
    }


    public function insertPortProj()
    {
        // ---------- IMAGE UPLOAD CONFIG ----------
        $config['upload_path'] = 'uploads/portproject/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 5120; // 5 MB
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        // ---------- IMAGE UPLOAD ----------
        if (!$this->upload->do_upload('full_project_image')) {

            sweetAlert(
                'Upload Failed',
                strip_tags($this->upload->display_errors()),
                'error',
                base_url('projects')
            );
            return;
        }

        $uploadData = $this->upload->data();
        $imagePath = 'uploads/portproject/' . $uploadData['file_name'];

        // ---------- INSERT PROJECT ----------
        $projectData = [
            'project_title' => $this->input->post('project_title', true),
            'project_link' => $this->input->post('project_link', true),
            'full_image' => $imagePath,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('portfolio_projects', $projectData);
        $projectId = $this->db->insert_id();

        // ---------- INSERT TAGS ----------
        $tags = $this->input->post('project_tags');

        if (!empty($tags)) {
            foreach ($tags as $tag) {
                if (trim($tag) !== '') {
                    $this->db->insert('portfolio_tags', [
                        'project_id' => $projectId,
                        'project_tags' => trim($tag),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        // ---------- SUCCESS ALERT ----------
        sweetAlert(
            'Success!',
            'Portfolio project added successfully',
            'success',
            base_url('projects')
        );
    }








    public function portfolioProjectRemove()
    {
        $projectId = (int) $this->input->get('id');

        if (!$projectId) {
            sweetAlert('Error', 'Invalid project ID', 'error', base_url('projects'));
            return;
        }

        // ---------- GET PROJECT (FOR IMAGE DELETE) ----------
        $project = $this->db
            ->where('id', $projectId)
            ->get('portfolio_projects')
            ->row();

        if (!$project) {
            sweetAlert('Error', 'Project not found', 'error', base_url('projects'));
            return;
        }

        // ---------- START TRANSACTION ----------
        $this->db->trans_start();

        // 1️⃣ Delete tags
        $this->db->where('project_id', $projectId)->delete('portfolio_tags');

        // 2️⃣ Delete project
        $this->db->where('id', $projectId)->delete('portfolio_projects');

        $this->db->trans_complete();

        // ---------- CHECK TRANSACTION ----------
        if ($this->db->trans_status() === FALSE) {
            sweetAlert('Failed', 'Delete failed, try again', 'error', base_url('projects'));
            return;
        }

        // ---------- DELETE IMAGE FILE ----------
        if (!empty($project->full_image)) {
            $imgPath = FCPATH . $project->full_image;
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }

        // ---------- SUCCESS ----------
        sweetAlert('Deleted!', 'Project and tags deleted successfully', 'success', base_url('projects'));
    }


}