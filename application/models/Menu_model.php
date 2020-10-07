<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getMenu()
    {
        $this->db->order_by("menu_position", "asc");
        return $this->db->get('menu_master')->result_array();
    }

}