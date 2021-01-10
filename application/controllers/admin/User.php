<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function index()
  {
    $data = array(
      'title' => "Data User",
      'user' => $this->model->show_user()->result()
    );
    $this->load->view('admin/user', $data);
  }

  public function save()
  {
    $id = base_convert(microtime(false), 18, 36);

    $cari = array('username' => $this->input->post('username'));
    $query = $this->db->get_where('user', $cari);
    $row = $query->row();

    if ($row->nama_barang == $this->input->post('username')) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0">
                  Maaf Username Sudah Ada :(
                </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect(base_url() . 'admin/user');
    } else {
      $char = array(
        'id_user' => $id,
        'username' => $this->input->post('username'),
        'nama' => $this->input->post('nama'),
        'password' => md5($this->input->post('password')),
        'level' => $this->input->post('level')
      );
      $this->model->save_user($char);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0">
          Data Berhasil Di Ditambahkan :)
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect(base_url() . 'admin/user');
    }
  }

  public function update()
  {
    $id = $this->input->post('kode');

    $pass = null;
    if ($this->input->post('password') == null) {
      $pass = $this->input->post('old_password');
    } else {
      $pass = md5($this->input->post('password'));
    }

    $char = array(
      'username' => $this->input->post('username'),
      'nama' => $this->input->post('nama'),
      'password' => $pass,
      'level' => $this->input->post('level')
    );

    $where = array(
      'id_user' => $id
    );

    $this->db->where($where);
    $this->db->update('user', $char);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p class="mb-0">
            Data Berhasil Di Update............
          </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
    redirect(base_url() . 'admin/user');
  }

  public function delete()
  {
    $id = $this->input->post('id');
    $where = array('id_user' => $id);
    $this->db->delete('user', $where);

    $this->model->update_brg_dsk($id);
  }
}
