<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['users'] = $this->user_model->get_users();
        $this->load->view('templates/header');
        $this->load->view('users/list', $data);
        $this->load->view('templates/footer');
    }
    
    public function create() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/create');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            $this->user_model->create_user($data);
            redirect('users');
        }
    }
    
    public function edit($id) {
        $data['user'] = $this->user_model->get_user($id);
        
        if (empty($data['user'])) {
            show_404();
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email')
            );
            
            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            
            $this->user_model->update_user($id, $data);
            redirect('users');
        }
    }
    
    public function delete($id) {
        $this->user_model->delete_user($id);
        redirect('users');
    }
}