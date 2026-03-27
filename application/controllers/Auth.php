<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index() {
        $this->load->view('login');
    }

    public function signup_page() {
        $this->load->view('signup');
    }
    public function register() {

    $email = $this->input->post('email');

    $exists = $this->db->get_where('users', ['email' => $email])->row();

    if ($exists) {
        echo json_encode([
            'status' => 'error',
            'msg' => 'Email already exists'
        ]);
        return;
    }

    $data = [
        'name' => $this->input->post('name'),
        'email' => $email,
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
    ];

    $this->db->insert('users', $data);

    echo json_encode(['status' => 'success']);
}

public function login() {

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('users', ['email' => $email])->row();

    if ($user && password_verify($password, $user->password)) {

        $this->session->set_userdata([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'logged_in' => true
        ]);

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
public function logout() {
    $this->session->sess_destroy();
    redirect('auth');
}
}