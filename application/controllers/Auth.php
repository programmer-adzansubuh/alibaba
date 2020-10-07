<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Login Page";
            $this->load->view('_partials/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('_partials/auth_footer');
        } else {
            $this->_login();
        }

    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user->getUserByEmail($email);

        var_dump($user);
        if ($user) {
            if ($user['user_status'] == 1) {
                $data = array(
                    'user_id' => $user['user_id'],
                    'email' => $user['user_email'],
                    'role_id' => $user['role_id']
                );
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('dashboard');
                } else {
                    redirect('dashboard');
                }
                if (password_verify($password, $user['user_password'])) {
                    $data = array(
                        'user_id' => $user['user_id'],
                        'email' => $user['user_email'],
                        'role_id' => $user['role_id']
                    );
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('dashboard');
                    } else {
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="text-small alert alert-danger alert-dismissible" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="mdi mdi-close small my-0"></i></a>Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="text-small alert alert-danger alert-dismissible" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="mdi mdi-close small my-0"></i></a>This email has been not activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="text-small alert alert-danger alert-dismissible" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="mdi mdi-close small my-0"></i></a>Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="text-small alert alert-success alert-dismissible" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="mdi mdi-close small my-0"></i></a>You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}