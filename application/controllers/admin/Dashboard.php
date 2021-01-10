<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect(base_url() . 'login');
        }
        $this->load->helper('text');
    }

    public function index()
    {
        $data = array(
            'title' => "Dashboard"
        );
        $this->load->view('admin/dashboard', $data);
    }
}
