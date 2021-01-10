<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => "Data Barang",
            'barang' => $this->model->show_barang()->result()
        );
        $this->load->view('admin/pesan', $data);
    }
}
