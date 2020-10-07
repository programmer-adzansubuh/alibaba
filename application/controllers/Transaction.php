<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    public $title = "Transaksi";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('User_model', 'user');
        $this->load->model('Customer_model', 'cust');
        $this->load->model('Group_model', 'group');
        $this->load->model('Product_model', 'product');
        $this->load->model('Transaction_model', 'trans');
        isLoggedIn();
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['menu'] = $this->menu->getMenu();
        $data['user'] = $this->user->getUsers();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['group'] = $this->group->getGroup();

        $this->load->view('_partials/header', $data);
        $this->load->view('transaction/index', $data);
        $this->load->view('_partials/footer');
    }

    public function create()
    {
        if (!$this->group->getGroupById($this->input->get('id'))) {
            redirect('transaction');
            exit;
        }

        $data['title'] = $this->title;
        $user = $this->user->getUsers();
        $data['user'] = $user;
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['menu'] = $this->menu->getMenu();
        $data['product'] = $this->product->getProduct($this->input->get('id'));
        $data['group'] = $this->group->getGroupById($this->input->get('id'));
        $data['cust'] = $this->cust->getCustomer();
        $data['cust_type'] = $this->cust->getCustomerType();
        $invoiceNumber = $this->trans->getNumber();

        $input = $invoiceNumber['order_code'];
        $last_word_start = strrpos($input, '/') + 1;
        $last_word = substr($input, $last_word_start);

        $data['inv'] = 'INV-'.date('Ymd')  . "/" . createNumber($last_word);

        $this->load->view('_partials/header', $data);
        $this->load->view('transaction/create', $data);
        $this->load->view('_partials/footer');
    }

    public function saveTransaction() {
        $time = time();

        $this->db->set('order_id', 'UUID()', FALSE);
        $this->db->insert('orders', array(
            'order_cust_id' => $this->input->post('order_cust_id'),
            'order_user_id' =>  $this->input->post('order_user_id'),
            'group_product_id' => $this->input->get('id'),
            'order_code' => $this->input->post('order_code'),
            'order_note' => $this->input->post('order_note'),
            'order_paid' => $this->input->post('order_paid'),
            'order_status' => $this->input->post('order_status'),
            'order_date' => strtotime($this->input->post('order_date')),
            'order_finish' => strtotime($this->input->post('order_finish')),
            'date_created' => $time,
            'date_modifed' => time()
        ));

        if ($this->input->post('order_item')) {
            $orderItem = array();
            $lastUUID = $this->trans->getLastUUIDbyTime($time);
            foreach ($this->input->post('order_item') as $item) {
                array_push($orderItem, array(
                    'order_item_id' => guidV4(),
                    'order_id' => $lastUUID['order_id'],
                    'order_product_id' => $item['product_id'],
                    'order_price_id' => $item['product_price_id'],
                    'order_finishing_id' => $item['product_finisihing_id'],
                    'order_quantity' => $item['quantity'],
                    'order_price' => $item['price'],
                    'order_unit_id' => $item['unit_id']
                ));

                $dataStock['product_id'] = $item['product_id'];
                $dataStock['stock'] = $item['quantity'];
                $dataStock['unit_id'] = $item['unit_id'];
                $dataStock['stock_type'] = 0;
                $dataStock['stock_note'] = 'Transaction Order';
                $this->product->updateStock($dataStock);
            }
            $this->trans->saveOrderItem($orderItem);
        }

        $this->toastr->success('New order added!');

        echo 'success';
    }

    public function getProducts() {
        echo json_encode($this->product->getProduct($this->input->get('id')));
    }

    public function getProductPrice() {
        echo json_encode($this->product->getProductPriceById($this->input->get('id')));
    }

    public function getProductPriceF() {
        echo json_encode($this->product->getProductfPriceById($this->input->get('id')));
    }


    public function getCustomer() {
        echo json_encode($this->cust->getCustomerById($this->input->post('cust_id')));
    }

    public function getProductById() {
        echo json_encode($this->product->getProductById($this->input->post('product_id')));
    }

    /*LIST*/
    public function list_of()
    {
        if (!$this->group->getGroupById($this->input->get('id'))) {
            redirect('transaction');
            exit;
        }

        $data['title'] = $this->title;
        $user = $this->user->getUsers();
        $data['user'] = $user;
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['menu'] = $this->menu->getMenu();
        $data['order'] = $this->trans->getOrder($this->input->get('id'));
        $data['group'] = $this->group->getGroupById($this->input->get('id'));
        $data['cust'] = $this->cust->getCustomer();
        $data['cust_type'] = $this->cust->getCustomerType();

        $this->load->view('_partials/header', $data);
        $this->load->view('transaction/list', $data);
        $this->load->view('_partials/footer');
    }

    public function getOrderItem() {
        $data['order_data'] = $this->trans->getOrderById($this->input->get('order_id'));
        $data['order_item'] = $this->trans->getOrderItem($this->input->get('order_id'));
        echo json_encode($data);
    }

    public function item()
    {
        if (!$this->group->getGroupById($this->input->get('id'))) {
            redirect('transaction');
            exit;
        }

        $data['title'] = $this->title;
        $data['user'] = $this->user->getUsers();
        $data['user_data'] = $this->user->getUserById($this->session->userdata('user_id'));
        $data['menu'] = $this->menu->getMenu();
        $data['product'] = $this->product->getProduct($this->input->get('id'));
        $data['group'] = $this->group->getGroupById($this->input->get('id'));
        $data['cust'] = $this->cust->getCustomer();
        $data['cust_type'] = $this->cust->getCustomerType();
        $data['cust_order'] = $this->cust->getCustomerByOrderId($this->input->get('order_id'));
        $data['order_item'] = $this->trans->getOrderItem($this->input->get('order_id'));

        $this->load->view('_partials/header', $data);
        $this->load->view('transaction/item', $data);
        $this->load->view('_partials/footer');
    }

    public function updateTransaction() {
        $this->db->where('order_id', $this->input->get('order_id'));
        $this->db->update('orders', array(
            'order_cust_id' => $this->input->post('order_cust_id'),
            'order_user_id' =>  $this->input->post('order_user_id'),
            'group_product_id' => $this->input->get('id'),
            'order_code' => $this->input->post('order_code'),
            'order_note' => $this->input->post('order_note'),
            'order_paid' => $this->input->post('order_paid'),
            'order_status' => $this->input->post('order_status'),
            'order_date' => strtotime($this->input->post('order_date')),
            'order_finish' => strtotime($this->input->post('order_finish')),
            'date_modifed' => time()
        ));

        $this->toastr->success('Order updated!');

        echo 'success';
    }
}