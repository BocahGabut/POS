<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect(base_url() . 'login');
        }
        $this->load->helper('text');
    }

    public function update()
    {
        $where = array(
            'id_option' => '1'
        );
        $data = array(
            'nama_toko' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_tlpn' => $this->input->post('tlpn'),
            'salam' => $this->input->post('salam'),
        );
        $this->model->update_option($where, $data);
        redirect(base_url() . 'admin/pengaturan');
    }

    public function index()
    {
        $data = array(
            'title' => "Pengaturan",
            'toko' => $this->model->data_toko()
        );
        $this->load->view('admin/pengaturan', $data);
    }
}
