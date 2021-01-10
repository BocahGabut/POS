<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => "Login"
        );
        $this->load->view('login', $data);
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $cek = $this->model->cek_login($where);
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id_user'] = $sess->id_user;
                $sess_data['username'] = $sess->username;
                $sess_data['level'] = $sess->level;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level') == '1') {
                redirect(base_url() . 'admin/dashboard');
            } elseif ($this->session->userdata('level') == '2') {
                redirect(base_url() . 'kasir/transmasuk');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="mb-0">
          Maaf Username Atau Password Salah :(
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
            redirect(base_url() . 'login');
        }
    }
}
