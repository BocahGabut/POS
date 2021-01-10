<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskon extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => "Data Diskon",
            'diskon' => $this->model->show_diskon()->result()
        );
        $this->load->view('admin/diskon', $data);
    }

    public function detail()
    {
        $where = array(
            'kode_diskon' => $this->uri->segment(4)
        );
        $data = array(
            'title' => "Data Barang",
            'barang' => $this->model->show_barang()->result(),
            'barang_dsk' => $this->model->show_barang_diskon($where)->result()
        );
        $this->load->view('admin/barang_diskon', $data);
    }

    public function update_diskon()
    {
        $id = $this->uri->segment(4);
        $kode_diskon = $this->uri->segment(5);

        $char = array(
            'kode_diskon' => $kode_diskon
        );

        $where = array(
            'kode_barang' => $id
        );

        $this->db->where($where);
        $this->db->update('barang', $char);
        redirect(base_url() . 'admin/diskon/detail/' . $kode_diskon);
    }

    public function remove_kode()
    {
        $id = $this->uri->segment(4);
        $kode_diskon = $this->uri->segment(5);

        $char = array(
            'kode_diskon' => '112345'
        );

        $where = array(
            'kode_barang' => $id
        );

        $this->db->where($where);
        $this->db->update('barang', $char);
        redirect(base_url() . 'admin/diskon/detail/' . $kode_diskon);
    }

    public function save()
    {
        $id = base_convert(microtime(false), 18, 36);

        $persen = null;
        $item = null;
        $ketentuan = null;
        if ($this->input->post('jenis_diskon') == 2) {
            $persen = $this->input->post('persen');
            $item = '0';
            $ketentuan = '0';
        } else if ($this->input->post('jenis_diskon') == 1) {
            $item = $this->input->post('free_item');
            $ketentuan = $this->input->post('ketentuan');
            $persen = '0';
        }

        $char = array(
            'kode_diskon' => $id,
            'nama_diskon' => $this->input->post('nama_diskon'),
            'type_diskon' => $this->input->post('jenis_diskon'),
            'tgl_awal' => $this->input->post('tgl_awal'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'persen' => $persen,
            'ketentuan' => $ketentuan,
            'item' => $item,
            'keterangan' => $this->input->post('ket')
        );
        $this->model->save_diskon($char);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0">
          Data Berhasil Di Ditambahkan :)
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect(base_url() . 'admin/diskon');
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $where = array('kode_diskon' => $id);
        $this->db->delete('diskon', $where);

        $this->model->update_brg_dsk($id);
    }
}
