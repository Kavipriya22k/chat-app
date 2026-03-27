<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function index() {

        if(!$this->session->userdata('logged_in')){
            redirect('auth');
        }

        $this->load->view('chat');
    }

    public function send_message() {

        $this->db->insert('messages', [
            'sender_id' => $this->session->userdata('user_id'),
            'message' => $this->input->post('message')
        ]);
    }

    public function get_messages() {

        $this->db->select('messages.*, users.name');
        $this->db->from('messages');
        $this->db->join('users', 'users.id = messages.sender_id');
        $this->db->order_by('messages.id', 'ASC');

        $data = $this->db->get()->result();

        echo json_encode($data);
    }
}