<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lap_keluar extends CI_Controller
{

  public function index()
  {
    $data = array(
      'title' => "Data Transaksi",
      'masuk' => $this->model->show_lap_masuk()->result()
    );
    $this->load->view('admin/lap_keluar', $data);
  }

  public function save()
  {
    $id = base_convert(microtime(false), 18, 36);

    $cari = array('nama_kategori' => $this->input->post('kategori'));
    $query = $this->db->get_where('kategori', $cari);
    $row = $query->row();

    if ($row->nama_kategori == $this->input->post('kategori')) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="mb-0">
             Maaf Data Kategori Sudah Ada :(
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url() . 'admin/kategori');
    } else {
      $char = array(
        'kode_kategori' => $id,
        'nama_kategori' => $this->input->post('kategori')
      );
      $this->model->save_kategori($char);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="mb-0">
            Data Berhasil Di Tambahkan........
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect(base_url() . 'admin/kategori');
    }
  }

  public function update()
  {
    $id = $this->input->post('kode_kategori');
    $kategori = $this->input->post('kategori');

    $char = array(
      'nama_kategori' => $kategori
    );

    $where = array(
      'kode_kategori' => $id
    );

    $this->db->where($where);
    $this->db->update('kategori', $char);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0">
          Data Berhasil Di Update.................
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect(base_url() . 'admin/kategori');
  }

  public function delete()
  {
    $id = $this->input->post('id');
    $where = array('kode_kategori' => $id);
    $this->db->delete('kategori', $where);
  }
}
