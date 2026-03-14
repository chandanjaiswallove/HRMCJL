<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    // update function code
    public function updatePriceCard()
    {
        $pricingId = (int) $this->input->post('pricing_id');

        // ---------- VALIDATION ----------
        if (!$pricingId) {
            sweetAlert('Error', 'Invalid pricing ID', 'error', base_url('pricing'));
            return;
        }

        // ---------- CHECK OLD CARD ----------
        $oldCard = $this->db
            ->where('id', $pricingId)
            ->get('pricing_card')
            ->row();

        if (!$oldCard) {
            sweetAlert('Error', 'Pricing card not found', 'error', base_url('pricing'));
            return;
        }

        // ---------- UPDATE pricing_card ----------
        $updateData = [
            'plan_name' => $this->input->post('plan_name', true),
            'small_description' => $this->input->post('small_description', true),
            'pricing' => $this->input->post('pricing', true),
            'duration' => $this->input->post('duration', true),
            'sample_url' => $this->input->post('sample_url', true),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $pricingId)->update('pricing_card', $updateData);

        // ---------- ITEMS UPDATE (DELETE → INSERT) ----------
        $this->db->where('pricing_id', $pricingId)->delete('pricing_items');

        $items = $this->input->post('item_list');

        if (is_array($items)) {
            foreach ($items as $item) {
                $item = trim($item);
                if ($item !== '') {
                    $this->db->insert('pricing_items', [
                        'pricing_id' => $pricingId,
                        'item_text' => $item,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        // ---------- SUCCESS ----------
        sweetAlert(
            'Updated!',
            'Pricing card updated successfully',
            'success',
            base_url('pricing')
        );
    }



    // insert funciton code
    public function insertPricecard()
    {
        // =========================
        // BASIC VALIDATION
        // =========================
        if (!$this->input->post('plan_name')) {
            sweetAlert('Error', 'Plan name is required', 'error', base_url('pricing'));
            return;
        }

        // =========================
        // INSERT PRICING CARD
        // =========================
        $cardData = [
            'plan_name' => $this->input->post('plan_name', true),
            'small_description' => $this->input->post('small_description', true),
            'pricing' => $this->input->post('pricing', true),
            'duration' => $this->input->post('duration', true),
            'sample_url' => $this->input->post('plan_url', true),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('pricing_card', $cardData);

        $pricingId = $this->db->insert_id();

        if (!$pricingId) {
            sweetAlert('Failed', 'Pricing card not saved', 'error', base_url('pricing'));
            return;
        }

        // =========================
        // INSERT ITEM LIST
        // =========================
        $items = $this->input->post('item_list');

        if (!empty($items)) {
            foreach ($items as $item) {
                if (trim($item) !== '') {
                    $this->db->insert('pricing_items', [
                        'pricing_id' => $pricingId,
                        'item_text' => trim($item),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        // =========================
        // SUCCESS
        // =========================
        sweetAlert(
            'Success',
            'Pricing card added successfully',
            'success',
            base_url('pricing')
        );
    }











    // delete price card function
    public function deletePriceCard()
    {
        $pricingId = $this->input->get('id');

        // =========================
        // VALIDATION
        // =========================
        if (!$pricingId) {
            sweetAlert('Error', 'Invalid pricing ID', 'error', base_url('pricing'));
            return;
        }

        // =========================
        // CHECK EXISTS
        // =========================
        $card = $this->db
            ->where('id', $pricingId)
            ->get('pricing_card')
            ->row();

        if (!$card) {
            sweetAlert('Error', 'Pricing Card not found', 'error', base_url('pricing'));
            return;
        }

        // =========================
        // DELETE ITEMS FIRST
        // =========================
        $this->db->where('pricing_id', $pricingId)->delete('pricing_items');

        // =========================
        // DELETE PRICING CARD
        // =========================
        if ($this->db->where('id', $pricingId)->delete('pricing_card')) {

            sweetAlert(
                'Deleted!',
                'Pricing Card deleted successfully',
                'success',
                base_url('pricing')
            );

        } else {

            sweetAlert(
                'Failed',
                'Delete failed, please try again',
                'error',
                base_url('pricing')
            );
        }
    }


}