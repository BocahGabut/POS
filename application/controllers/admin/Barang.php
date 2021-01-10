<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

  public function index()
  {
    $data = array(
      'title' => "Data Barang",
      'barang' => $this->model->show_barang()->result(),
      'kategori' => $this->model->show_kategori()->result()
    );
    $this->load->view('admin/barang', $data);
  }

  public function save()
  {
    $id = $this->model->kode();

    $cari = array('nama_barang' => $this->input->post('barang'));
    $query = $this->db->get_where('barang', $cari);
    $row = $query->row();

    if ($row->nama_barang == $this->input->post('barang')) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="mb-0">
              Data Barang Sudah Ada :(
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url() . 'admin/barang');
    } else {

      $char = array(
        'kode_barang' => $id,
        'nama_barang' => $this->input->post('barang'),
        'kode_kategori' => $this->input->post('kategori'),
        'stock' => '0',
        'satuan' => $this->input->post('satuan'),
        'max_stock' => $this->input->post('maks'),
        'min_stock' => $this->input->post('min'),
        'harga_jual' => $this->input->post('hrg_jual'),
        'harga_beli' => $this->input->post('hrg_beli'),
        'kode_diskon' => '112345'
      );
      $this->model->save_barang($char);
      redirect(base_url() . 'admin/barang');
    }
  }

  public function update()
  {
    $id = $this->input->post('kode');

    $char = array(
      'nama_barang' => $this->input->post('barang'),
      'kode_kategori' => $this->input->post('kategori'),
      'satuan' => $this->input->post('satuan'),
      'max_stock' => $this->input->post('maks'),
      'min_stock' => $this->input->post('min'),
      'harga_jual' => $this->input->post('hrg_jual'),
      'harga_beli' => $this->input->post('hrg_beli')
    );

    $where = array(
      'kode_barang' => $id
    );

    $this->db->where($where);
    $this->db->update('barang', $char);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0">
          Data Berhasil Di Update............
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect(base_url() . 'admin/barang');
  }

  public function delete()
  {
    $id = $this->input->post('id');
    $where = array('kode_barang' => $id);
    $this->db->delete('barang', $where);
  }
}
