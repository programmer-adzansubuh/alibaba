<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('User_model', 'user');
        isLoggedIn();
    }

    public function index()
    {
        $data['title'] = 'Data Pengguna';
        $data['menu'] = $this->menu->getMenu();
        $data['user'] = $this->user->getUsers();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $this->load->view('_partials/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('_partials/footer');
    }

    public function add()
    {
        $data['title'] = 'Data Pengguna';
        $data['menu'] = $this->menu->getMenu();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));

        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
        $this->form_validation->set_rules('role', 'User Role', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[4]|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('_partials/header', $data);
            $this->load->view('user/add', $data);
            $this->load->view('_partials/footer');
        } else {
            $this->db->set('user_id', 'UUID()', FALSE);
            $this->db->insert('users', array(
                'user_fullname' => $this->input->post('fullname'),
                'user_name' => $this->input->post('username'),
                'user_phone' => $this->input->post('phone'),
                'user_email' => $this->input->post('email'),
                'user_address' => $this->input->post('address'),
                'user_role_id' => $this->input->post('role'),
                'user_status' => $this->input->post('active'),
                'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_created' => time()

            ));
            $this->toastr->success('New data added!');
            redirect('user');
        }
    }

    public function update()
    {
        $data['title'] = 'Data Pengguna';
        $data['menu'] = $this->menu->getMenu();
        $data['user'] = $this->user->getUserById($this->input->get('id'));
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));

        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
        $this->form_validation->set_rules('role', 'User Role', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'min_length[4]|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('_partials/header', $data);
            $this->load->view('user/update', $data);
            $this->load->view('_partials/footer');
        } else {
            $this->db->where('user_id', $this->input->post('id'));
            $this->db->update('users', array(
                'user_fullname' => $this->input->post('fullname'),
                'user_name' => $this->input->post('username'),
                'user_phone' => $this->input->post('phone'),
                'user_email' => $this->input->post('email'),
                'user_address' => $this->input->post('address'),
                'user_role_id' => $this->input->post('role'),
                'user_status' => $this->input->post('active'),
                'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_modifed' => time()
            ));
            $this->toastr->success('New data added!');
            redirect('user');
        }
    }

    public function delete() {
        $this->db->delete('users', array(
            'user_id' => $this->input->get('delete_id'),
        ));
        $this->toastr->success('User deleted!');
        redirect('user');
    }
}