<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('User_model', 'user');
        $this->load->model('Customer_model', 'cust');
        $this->load->model('Group_model', 'group');
        isLoggedIn();
    }

    public function index()
    {
        $data['title'] = 'Data Pelanggan';
        $data['menu'] = $this->menu->getMenu();
        $data['user'] = $this->user->getUsers();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['cust'] = $this->cust->getCustomer();
        $data['cust_type'] = $this->cust->getCustomerType();
        $data['group'] = $this->group->getGroupById($this->input->get('id'));

        $this->form_validation->set_rules('name', 'Customer Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('type', 'Customer Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('_partials/header', $data);
            $this->load->view('customer/index', $data);
            $this->load->view('_partials/footer');
        } else {
            if ($this->input->post('id')) {
                $this->db->where('customer_id', $this->input->post('id'));
                $this->db->update('customer', array(
                    'customer_name' => $this->input->post('name'),
                    'customer_phone' => $this->input->post('phone'),
                    'customer_email' => $this->input->post('email'),
                    'customer_address' => $this->input->post('address'),
                    'customer_type_id' => $this->input->post('type'),
                    'date_modifed' => time()
                ));
                $this->toastr->success('Data updated!');
                redirect('customer');
            }
            else {
                $this->db->set('customer_id', 'UUID()', FALSE);
                $this->db->insert('customer', array(
                    'customer_name' => $this->input->post('name'),
                    'customer_phone' => $this->input->post('phone'),
                    'customer_email' => $this->input->post('email'),
                    'customer_address' => $this->input->post('address'),
                    'customer_type_id' => $this->input->post('type'),
                    'date_created' => time()
                ));
                $this->toastr->success('New data added!');
                redirect('customer');
            }
        }
    }

    public function delete() {
        $this->db->delete('customer', array(
            'customer_id' => $this->input->get('delete_id'),
        ));
        $this->toastr->success('Customer deleted!');
        redirect('customer');
    }

    public function addCustomer() {
        $time = time();
        $this->db->set('customer_id', 'UUID()', FALSE);
        $this->db->insert('customer', array(
            'customer_name' => $this->input->post('name'),
            'customer_phone' => $this->input->post('phone'),
            'customer_email' => $this->input->post('email'),
            'customer_address' => $this->input->post('address'),
            'customer_type_id' => $this->input->post('type'),
            'date_created' => $time
        ));
        $lastUUID = $this->cust->getLastUUIDbyTime($time);
        echo json_encode($this->cust->getCustomerById($lastUUID['customer_id']));
    }
}