<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    public function getNumber()
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->order_by('date_created', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }

    public function getLastUUIDbyTime($time) {
        $this->db->where('date_created', $time);
        return $this->db->get('orders')->row_array();
    }

    public function saveOrderItem($orderItem) {
        $this->db->insert_batch('order_item', $orderItem);
        return;
    }

    public function getOrder($group) {
        $this->db->select('*, orders.date_created as date, COUNT(order_item.order_id) as order_item, 
                                SUM(order_item.order_price * order_item.order_quantity) as total_harga');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.order_id = order_item.order_id');
        $this->db->join('customer', 'orders.order_cust_id= customer.customer_id');
        $this->db->join('product', 'order_item.order_product_id = product.product_id', 'left');
        $this->db->join('users', 'orders.order_user_id = users.user_id', 'left');
        $this->db->group_by('orders.order_id');
        $this->db->order_by('orders.date_created', 'desc');
        $this->db->where('product_group_id', $group);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getOrderById($order_id) {
        $this->db->select('*, COUNT(order_item.order_id) as order_item, 
                                SUM(order_item.order_price * order_item.order_quantity) as total_harga');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.order_id = order_item.order_id');
        $this->db->join('customer', 'orders.order_cust_id= customer.customer_id');
        $this->db->join('product', 'order_item.order_product_id = product.product_id', 'left');
        $this->db->join('users', 'orders.order_user_id = users.user_id', 'left');
        $this->db->group_by('orders.order_id');
        $this->db->order_by('orders.date_created', 'desc');
        $this->db->where('orders.order_id', $order_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getOrderItem($order_id) {
        $this->db->select('*');
        $this->db->distinct('order_id');
        $this->db->from('order_item');
        $this->db->join('product', 'order_item.order_product_id = product.product_id', 'inner');
        $this->db->join('product_finishing', 'order_item.order_finishing_id = product_finishing.product_finishing_id', 'left');
        $this->db->join('product_price', 'order_item.order_price_id = product_price.product_price_id', 'inner');
        $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id', 'inner');
        $this->db->join('product_unit', 'order_item.order_unit_id = product_unit.unit_id', 'left');
        $this->db->where('order_id', $order_id);
        $query = $this->db->get();
        return $query->result_array();
    }

}