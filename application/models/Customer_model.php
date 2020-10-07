<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public function getCustomer() {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('customer_type', 'customer.customer_type_id = customer_type.cust_type_id');
        return $this->db->get()->result_array();
    }

    public function getCustomerType() {
        return $this->db->get('customer_type')->result_array();
    }

    public function getCustomerById($id) {
        $this->db->where('customer_id', $id);
        return $this->db->get('customer')->row_array();
    }

    public function getCustomerByOrderId($id) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('orders', 'customer.customer_id = orders.order_cust_id');
        $this->db->where('orders.order_id', $id);
        return $this->db->get()->row_array();
    }

    public function getLastUUIDbyTime($time) {
        $this->db->where('date_created', $time);
        return $this->db->get('customer')->row_array();
    }
}