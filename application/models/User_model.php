<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUsers() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.role_id = users.user_role_id', 'inner');
        return $this->db->get()->result_array();
    }

    public function getUserById($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.role_id = users.user_role_id', 'inner');
        $this->db->where('user_id', $id);
        return $this->db->get()->row_array();
    }

    public function getUserByEmail($email) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.role_id = users.user_role_id', 'inner');
        $this->db->where('user_email', $email);
        return $this->db->get()->row_array();
    }

}