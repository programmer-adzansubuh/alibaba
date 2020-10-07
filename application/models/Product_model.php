<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function getProduct($group) {
        $this->db->select('*, (SUM(
        CASE WHEN product_stock.stock_type=1 THEN product_stock.product_stock_value
              ELSE 0
              END
        ) 
        -
        SUM(
        CASE WHEN product_stock.stock_type=0 THEN product_stock.product_stock_value
              ELSE 0
              END
        )) as product_stock');
        $this->db->from('product');
        $this->db->join('product_stock', 'product.product_id = product_stock.product_id', 'left');
        $this->db->join('product_unit', 'product.product_min_order_unit_id = product_unit.unit_id', 'left');
        $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id');
        $this->db->group_by('product.product_id');
        $this->db->order_by('stock_date_created', 'desc');
        $this->db->where('product_group_id', $group);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductById($product_id) {
        $this->db->select('*, (SUM(
        CASE WHEN product_stock.stock_type=1 THEN product_stock.product_stock_value
              ELSE 0
              END
        ) 
        -
        SUM(
        CASE WHEN product_stock.stock_type=0 THEN product_stock.product_stock_value
              ELSE 0
              END
        )) as product_stock');
        $this->db->from('product');
        $this->db->join('product_stock', 'product.product_id = product_stock.product_id', 'left');
        $this->db->join('product_unit', 'product.product_min_order_unit_id = product_unit.unit_id', 'left');
        $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id');
        $this->db->where('product.product_id', $product_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getProductPriceById($product_id) {
        $this->db->select('*');
        $this->db->from('product_price');
        $this->db->join('product_unit', 'product_price.unit_id = product_unit.unit_id');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductfPriceById($product_id) {
        $this->db->select('*');
        $this->db->from('product_finishing');
        $this->db->join('product_unit', 'product_finishing.unit_id = product_unit.unit_id');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saveProductPrice($priceArray) {
        $this->db->insert_batch('product_price', $priceArray);
        return;
    }

    public function saveProductPricef($priceArray) {
        $this->db->insert_batch('product_finishing', $priceArray);
        return;
    }

    public function getLastUUIDbyTime($time) {
        $this->db->where('date_created', $time);
        return $this->db->get('product')->row_array();
    }

    public function updateStock($data) {
        $this->db->set('product_stock_id','UUID()', FALSE);
        $this->db->insert('product_stock', array(
            'product_id' => $data['product_id'],
            'product_stock_value' => $data['stock'],
            'unit_id' => $data['unit_id'],
            'stock_type' => $data['stock_type'],
            'product_stock_note' => $data['stock_note'],
            'stock_date_created' => time(),
            'stock_date_modifed' => time(),
        ));
        return;
    }
}