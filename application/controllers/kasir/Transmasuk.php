<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transmasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect(base_url() . 'login');
        }
        $this->load->helper('text');
    }

    public function print()
    {
        //$kode = $this->input->post('id');

        $hasil = $this->model->show_print();
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $has) {
                $resultSet[] = $has;
            }
        } else {
            $resultSet[] = 'not found';
        }
        echo json_encode($resultSet);
    }

    public function barang_beli()
    {
        $kode = $this->input->post('id');

        $hasil = $this->model->barang_beli($kode);
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $has) {
                $resultSet[] = $has;
            }
        } else {
            $resultSet[] = 'not found';
        }
        echo json_encode($resultSet);
    }

    public function index()
    {
        $no_fak = $this->model->no_faktur_min();
        $data = array(
            'title' => "Data Diskon",
            'no_fak' => $no_fak,
            'website' => $this->model->pengaturan_print()->result()
        );
        $this->load->view('kasir/index', $data);
    }

    public function add_cart()
    {
        $harga = $this->input->post('harga');
        $diskon = $this->input->post('diskon');
        $qty = $this->input->post('qty');
        $qty_bns = $this->input->post('buy') + $this->input->post('ket');

        $dsk = $harga * $diskon / '100';
        $total = $harga - $dsk;

        $bonus = $harga * $this->input->post('ket');
        $total_get = $harga * $qty - $bonus;


        $data = null;
        if ($this->input->post('type_dsk') == '2') {
            $data = array(
                'id'      => $this->input->post('kode_barang'),
                'qty'     => $this->input->post('qty'),
                'qty_dsk'     => $this->input->post('qty'),
                'price'   => $total,
                'ket'     => $this->input->post('buy'),
                'free'     => $this->input->post('ket'),
                'name'    => $this->input->post('nama_barang'),
                'diskon' => $this->input->post('diskon'),
                'all_stock' => $this->input->post('stock'),
                'type_dsk' => $this->input->post('type_dsk'),
                'harga' => $this->input->post('harga')
            );
        } else if ($this->input->post('type_dsk') == '1') {
            if ($qty == $qty_bns) {
                $data = array(
                    'id'      => $this->input->post('kode_barang'),
                    'qty'     => 1,
                    'qty_dsk'     => $this->input->post('qty'),
                    'price'   => $total_get,
                    'ket'     => $this->input->post('buy'),
                    'free'     => $this->input->post('ket'),
                    'name'    => $this->input->post('nama_barang'),
                    'diskon' => $this->input->post('diskon'),
                    'all_stock' => $this->input->post('stock'),
                    'type_dsk' => $this->input->post('type_dsk'),
                    'harga' => $this->input->post('harga')
                );
            } else {
                $data = array(
                    'id'      => $this->input->post('kode_barang'),
                    'qty'     => $this->input->post('qty'),
                    'qty_dsk'     => $this->input->post('qty'),
                    'price'   => $this->input->post('harga'),
                    'ket'     => $this->input->post('buy'),
                    'free'     => $this->input->post('ket'),
                    'name'    => $this->input->post('nama_barang'),
                    'diskon' => '',
                    'all_stock' => $this->input->post('stock'),
                    'type_dsk' => $this->input->post('type_dsk'),
                    'harga' => $this->input->post('harga')
                );
            }
        } else {
            $data = array(
                'id'      => $this->input->post('kode_barang'),
                'qty'     => $this->input->post('qty'),
                'qty_dsk'     => $this->input->post('qty'),
                'price'   => $this->input->post('harga'),
                'ket'     => $this->input->post('buy'),
                'free'     => $this->input->post('ket'),
                'name'    => $this->input->post('nama_barang'),
                'diskon' => '',
                'all_stock' => $this->input->post('stock'),
                'type_dsk' => $this->input->post('type_dsk'),
                'harga' => $this->input->post('harga')
            );
        }

        $this->cart->insert($data);
        redirect(base_url() . 'kasir/transmasuk');
    }

    function removeCartItem($rowid)
    {
        $data = array(
            'rowid'   => $rowid,
            'qty'     => 0
        );

        $this->cart->update($data);
        redirect(base_url() . 'kasir/transmasuk');
    }

    function removeall()
    {
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'   => $items['rowid'],
                'qty'     => 0
            );
            $this->cart->update($data);
        }

        redirect(base_url() . 'kasir/transmasuk');
    }

    public function save()
    {
        $kd_user = $this->session->userdata('id_user');
        $no_fak = $this->model->no_faktur();
        $tgl = date("Y-m-d");

        $char = array(
            'no_faktur' => $no_fak,
            'tgl_transaksi' => $tgl,
            'kode_user' => $kd_user,
            'total_transaksi' => $this->input->post('total_belanja'),
            'kembalian' => $this->input->post('kembalian'),
            'bayar' => $this->input->post('tunai')
        );

        foreach ($this->cart->contents() as $items) {
            $data = [
                'id_transaksi' => $no_fak,
                'kode_barang' => $items['id'],
                'sub_total' => $items['subtotal'],
                'harga' => $items['price'],
                'qty' => $items['qty'],
            ];
            $this->model->update_stock_kl($items['id'], $items['qty']);
            $this->db->insert('detail_transkeluar', $data);
        }
        $insert = $this->model->save_transaksi($char);
        echo json_encode($insert);
    }

    public function update_qty()
    {
        $harga = $this->input->post('harga');
        $diskon = $this->input->post('diskon');
        $qty = $this->input->post('qty_update');

        $dsk = $harga * $diskon / '100';
        $total = $harga - $dsk;

        $qty_dsk = $this->input->post('buy') - $this->input->post('ket');
        $bonus = $harga * $this->input->post('ket');
        $total_get = $harga * $qty - $bonus;

        $data = null;
        if ($this->input->post('type') == '2') {
            $data = array(
                'rowid'   => $this->input->post('rowid'),
                'qty'     => $this->input->post('qty_update'),
                'qty_dsk' => $this->input->post('qty_update'),
                'dsk' => $total
            );
        } else if ($this->input->post('type') == '1') {
            if ($qty == $qty_dsk) {
                $data = array(
                    'rowid'   => $this->input->post('rowid'),
                    'qty'     => $qty_dsk,
                    'qty_dsk' => $this->input->post('qty_update'),
                    'dsk' => $total_get
                );
            } else {
                $data = array(
                    'rowid'   => $this->input->post('rowid'),
                    'qty'     => $this->input->post('qty_update'),
                    'qty_dsk' => $this->input->post('qty_update'),
                    'dsk' => $total
                );
            }
        } else {
            $data = array(
                'rowid'   => $this->input->post('rowid'),
                'qty'     => $this->input->post('qty_update'),
                'qty_dsk' => $this->input->post('qty_update'),
                'dsk' => $total_get
            );
        }

        $this->cart->update($data);
        redirect(base_url() . 'kasir/transmasuk');
    }

    public function show_cart()
    {
        $show_data = $this->cart->contents();
        echo '<pre>';
        print_r($show_data);
    }

    public function get_data()
    {
        $kode = $this->uri->segment('4');

        $cari = array('kode_barang' => $kode);
        $query = $this->db->get_where('barang', $cari);
        $row = $query->row();

        $data = array(
            'barang' => $this->model->search_barang($kode)->result()
        );
        $this->load->view('kasir/detail_barang', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect(base_url('login'));
    }
}
