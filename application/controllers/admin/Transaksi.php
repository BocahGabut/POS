<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => "Data Barang Masuk",
            'masuk' => $this->model->trans_masuk()->result(),
            'barang' => $this->model->show_barang()->result()
        );
        $this->load->view('admin/trans_masuk', $data);
    }

    public function save_tras_masuk()
    {
        $id = base_convert(microtime(false), 18, 36);
        $tgl = date("l") . date(", Y-m-d");

        $char = array(
            'id_transaksi' => $id,
            'kode_barang' => $this->input->post('barang'),
            'jumlah_beli' => $this->input->post('stock'),
            'tgl_transaksi' => $tgl
        );

        $this->db->insert('transaksi_masuk', $char);

        $cari = array('kode_barang' => $this->input->post('barang'));
        $query = $this->db->get_where('barang', $cari);
        $row = $query->row();

        $stock_total = $row->stock + $this->input->post('stock');

        $stock = array('stock' => $stock_total);
        $where_barang = array(
            'kode_barang' => $this->input->post('barang')
        );

        $this->db->where($where_barang);
        $this->db->update('barang', $stock);

        redirect(base_url() . 'admin/transaksi');
    }

    public function delete_trans_masuk()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');

        $where = array('id_transaksi' => $id);
        $this->db->where($where);
        $this->db->delete('transaksi_masuk', $where);

        $this->model->update_stock($kode);
    }
}
