<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $data['title'] = 'Dashboard';
        $data['menu'] = $this->menu->getMenu();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $this->load->view('_partials/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('_partials/footer');
    }

}