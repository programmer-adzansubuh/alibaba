<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends CI_Model
{
    public function getGroup()
    {
        $this->db->order_by("group_product_id", "desc");
        return $this->db->get('group_products')->result_array();
    }

    public function getGroupById($id)
    {
        $this->db->where("group_product_id", $id);
        return $this->db->get('group_products')->row_array();
    }

    public function getProductType()
    {
        return $this->db->get('product_type')->result_array();
    }
}