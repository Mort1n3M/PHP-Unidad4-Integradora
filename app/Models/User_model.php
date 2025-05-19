<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_users() {
        return $this->db->get('usuarios')->result();
    }
    
    public function create_user($data) {
        return $this->db->insert('usuarios', $data);
    }
    
    public function get_user($id) {
        return $this->db->get_where('usuarios', ['id' => $id])->row();
    }
    
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $data);
    }
    
    public function delete_user($id) {
        return $this->db->delete('usuarios', ['id' => $id]);
    }
}