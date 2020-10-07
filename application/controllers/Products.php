<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('User_model', 'user');
        $this->load->model('Customer_model', 'cust');
        $this->load->model('Group_model', 'group');
        $this->load->model('Product_model', 'product');
        isLoggedIn();
    }

    public function index()
    {
        $data['title'] = 'Product';
        $data['menu'] = $this->menu->getMenu();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['group'] = $this->group->getGroup();

        $this->load->view('_partials/header', $data);
        $this->load->view('products/index', $data);
        $this->load->view('_partials/footer');
    }

    public function group()
    {
        $data['title'] = 'Product';
        $data['menu'] = $this->menu->getMenu();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['product'] = $this->product->getProduct($this->input->get('id'));
        $data['group'] = $this->group->getGroupById($this->input->get('id'));

        $this->load->view('_partials/header', $data);
        $this->load->view('products/list', $data);
        $this->load->view('_partials/footer');
    }

    public function group_add()
    {
        $data['title'] = 'Product';
        $data['menu'] = $this->menu->getMenu();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['group'] = $this->group->getGroupById($this->input->get('id'));
        $data['unit'] = $this->db->get('product_unit')->result_array();
        $data['type'] = $this->group->getProductType();

        $this->form_validation->set_rules('name', 'Type Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('_partials/header', $data);
            $this->load->view('products/add', $data);
            $this->load->view('_partials/footer');
        } else {
            $uuid = 'UUID()';
            $time = time();
            $this->db->set('product_id', $uuid, FALSE);
            $this->db->insert('product', array(
                'product_name' => $this->input->post('name'),
                'product_min_order' => $this->input->post('min'),
                'product_min_order_unit_id' => $this->input->post('min_unit_id'),
                'product_type_id' => $this->input->post('type_id'),
                'product_group_id' => $this->input->post('group_id'),
                'date_created' => $time,
                'date_modifed' => $time,
            ));

            if ($this->input->post('product_price')) {
                $priceArray = array();
                $lastUUID = $this->product->getLastUUIDbyTime($time);
                foreach ($this->input->post('product_price') as $item) {
                    array_push($priceArray, array(
                        'product_price_id' => $item['id'],
                        'product_id' => $lastUUID['product_id'],
                        'unit_id' => $item['unit'],
                        'product_price_name' => $item['price_type'],
                        'product_price_hm' => $item['hargam'],
                        'product_price_hj' => $item['hargaj']
                    ));
                }
                $this->product->saveProductPrice($priceArray);
            }

            if ($this->input->post('product_pricef')) {
                $priceArrayf = array();
                $lastUUID = $this->product->getLastUUIDbyTime($time);
                foreach ($this->input->post('product_pricef') as $item) {
                    array_push($priceArrayf, array(
                        'product_finishing_id' => $item['idf'],
                        'product_id' => $lastUUID['product_id'],
                        'unit_id' => $item['unitf'],
                        'product_finishing_name' => $item['price_f'],
                        'product_finishing_price' => $item['hargaf']
                    ));
                }
                $this->product->saveProductPricef($priceArrayf);
            }

            $lastUUID = $this->product->getLastUUIDbyTime($time);
            $this->db->set('product_stock_id', 'UUID()', FALSE);
            $this->db->insert('product_stock', array(
                'product_id' => $lastUUID['product_id'],
                'unit_id' => $this->input->post('min_unit_id'),
                'stock_type' => 1,
                'stock_date_created' => $time,
                'stock_date_modifed' => $time,
            ));

            $this->toastr->success('New data added!');
            echo 'success';
        }

    }

    public function group_update()
    {
        $data['title'] = 'Product';
        $data['menu'] = $this->menu->getMenu();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['group'] = $this->group->getGroupById($this->input->get('id'));
        $data['product'] = $this->product->getProductById($this->input->get('product_id'));
        $data['price'] = $this->product->getProductPriceById($this->input->get('product_id'));
        $data['finishing'] = $this->product->getProductfPriceById($this->input->get('product_id'));
        $data['unit'] = $this->db->get('product_unit')->result_array();
        $data['type'] = $this->group->getProductType();


        $this->form_validation->set_rules('name', 'Type Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('_partials/header', $data);
            $this->load->view('products/update', $data);
            $this->load->view('_partials/footer');
        } else {
            $this->db->where('product_id', $this->input->get('product_id'));
            $this->db->update('product', array(
                'product_name' => $this->input->post('name'),
                'product_min_order' => $this->input->post('min'),
                'product_min_order_unit_id' => $this->input->post('min_unit_id'),
                'product_type_id' => $this->input->post('type_id'),
                'product_group_id' => $this->input->post('group_id'),
                'date_modifed' => time(),
            ));

            if ($this->input->post('product_price')) {
                $priceArray = array();
                foreach ($this->input->post('product_price') as $item) {
                    array_push($priceArray, array(
                        'product_price_id' => $item['id'],
                        'product_id' => $item['product_id'],
                        'unit_id' => $item['unit'],
                        'product_price_name' => $item['price_type'],
                        'product_price_hm' => $item['hargam'],
                        'product_price_hj' => $item['hargaj']
                    ));
                }
                $this->product->saveProductPrice($priceArray);
            }

            if ($this->input->post('product_pricef') ) {
                $priceArrayf = array();
                foreach ($this->input->post('product_pricef') as $item) {
                    array_push($priceArrayf, array(
                        'product_finishing_id' => $item['idf'],
                        'product_id' => $item['product_id'],
                        'unit_id' => $item['unitf'],
                        'product_finishing_name' => $item['price_f'],
                        'product_finishing_price' => $item['hargaf']
                    ));
                }
                $this->product->saveProductPricef($priceArrayf);
            }

            $this->toastr->success('Product data updated!');
            echo 'success';
        }
    }

    public function stock_update() {

        $this->db->set('product_stock_id','UUID()', FALSE);
        $this->db->insert('product_stock', array(
            'product_id' => $this->input->post('product_id'),
            'product_stock_value' => $this->input->post('stock'),
            'unit_id' => $this->input->post('unit_id'),
            'stock_type' => $this->input->post('stock_type'),
            'product_stock_note' => $this->input->post('note'),
            'stock_date_created' => time(),
            'stock_date_modifed' => time(),
        ));

        $this->toastr->success('New data added!');
        echo 'success';
    }

    public function group_add_type()
    {
        $data['title'] = 'Product';
        $data['menu'] = $this->menu->getMenu();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['type'] = $this->db->get('product_type')->result_array();
        $data['group'] = $this->group->getGroupById($this->input->get('id'));
        $group_item = $this->group->getGroupById($this->input->get('id'));

        $this->form_validation->set_rules('name', 'Type Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('_partials/header', $data);
            $this->load->view('products/add-type', $data);
            $this->load->view('_partials/footer');
        } else {
            // Jika ada id berarti update
            if ($this->input->post('id')) {
                $this->db->where('product_type_id', $this->input->post('id'));
                $this->db->update('product_type', array(
                    'product_type_name' => $this->input->post('name'),
                    'product_type_note' => $this->input->post('note')
                ));
                $this->toastr->success('Data updated!');
                redirect('products/group_add_type?id=' . $group_item['group_product_id']);
            } // sebaliknya
            else {
                $this->db->set('product_type_id', 'UUID()', FALSE);
                $this->db->insert('product_type', array(
                    'product_type_name' => $this->input->post('name'),
                    'product_type_note' => $this->input->post('note')
                ));
                $this->toastr->success('New data added!');
                redirect('products/group_add_type?id=' . $group_item['group_product_id']);
            }

        }
    }

    public function deleteProduct()
    {
        $this->db->delete('product', array(
            'product_id' => $this->input->get('product_id'),
        ));
        $this->db->delete('product_price', array(
            'product_id' => $this->input->get('product_id'),
        ));
        $this->db->delete('product_finishing', array(
            'product_id' => $this->input->get('product_id'),
        ));
        $this->toastr->success('Product deleted!');
        redirect('products/group?id=' . $this->input->get('id'));
    }

    public function deleteType()
    {
        $this->db->delete('product_type', array(
            'product_type_id' => $this->input->get('delete_id'),
        ));
        $this->toastr->success('Menu deleted!');
        $group_item = $this->group->getGroupById($this->input->get('id'));
        redirect('products/group_add_type?id=' . $group_item['group_product_id']);
    }

    public function deletePrice()
    {
        $this->db->delete('product_price', array(
            'product_price_id' => $this->input->get('delete_id'),
        ));
        $this->toastr->success('Price item deleted!');
        redirect('products/group_update?id=' . $this->input->get('id') . '&product_id=' .
            $this->input->get('product_id'));
    }

    public function deletePricef()
    {
        $this->db->delete('product_finishing', array(
            'product_finishing_id' => $this->input->get('delete_id'),
        ));
        $this->toastr->success('Price item deleted!');
        redirect('products/group_update?id=' . $this->input->get('id') . '&product_id=' .
            $this->input->get('product_id'));
    }
}