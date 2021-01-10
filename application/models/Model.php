<?php

class Model extends CI_Model
{

     public function save_barang($data)
     {
          $this->db->insert('barang', $data);
     }

     public function save_transaksi($data)
     {
          $this->db->insert('transaksi_keluar', $data);
     }

     public function save_user($data)
     {
          $this->db->insert('user', $data);
     }

     public function save_diskon($data)
     {
          $this->db->insert('diskon', $data);
     }

     public function save_kategori($data)
     {
          $this->db->insert('kategori', $data);
     }

     public function show_barang()
     {
          $this->db->from('barang');
          $this->db->join('kategori', 'kategori.kode_kategori = barang.kode_kategori');
          return $this->db->get();
     }

     public function show_user()
     {
          $this->db->from('user');
          return $this->db->get();
     }

     public function show_lap_masuk()
     {
          $this->db->from('transaksi_keluar');
          $this->db->join('user', 'transaksi_keluar.kode_user = user.id_user');
          return $this->db->get();
     }

     public function show_diskon()
     {
          $this->db->from('diskon');
          return $this->db->get();
     }

     public function trans_masuk()
     {
          $this->db->from('transaksi_masuk');
          $this->db->join('barang', 'transaksi_masuk.kode_barang = barang.kode_barang');
          return $this->db->get();
     }

     public function update_stock($kode)
     {
          $cari = array('kode_barang' => $kode);
          $query = $this->db->get_where('barang', $cari);
          $row = $query->row();

          $stock_total = $row->stock - $this->input->post('stock');

          $stock = array('stock' => $stock_total);

          $where = array(
               'kode_barang' => $kode
          );

          $this->db->where($where);
          $this->db->update('barang', $stock);
     }

     public function show_kategori()
     {
          return $this->db->get('kategori');
     }

     public function show_barang_diskon($kode)
     {
          $this->db->from('barang');
          $this->db->join('kategori', 'kategori.kode_kategori = barang.kode_kategori', 'left');
          $this->db->where($kode);
          return $this->db->get();
     }

     public function get_data($kode)
     {
          $where = array(
               'kode_barang' => $kode
          );
          $this->db->where($where);
          return $this->db->get('barang')->result_array();
     }

     public function search_barang($kode)
     {
          $where = array(
               'kode_barang' => $kode
          );
          $this->db->like($where);
          $this->db->join('diskon', 'diskon.kode_diskon = barang.kode_diskon');
          $this->db->limit(1);
          return $this->db->get('barang');
     }

     public function kode()
     {
          $this->db->select('RIGHT(barang.kode_barang,2) as kode_barang', FALSE);
          $this->db->order_by('kode_barang', 'DESC');
          $this->db->limit(1);
          $query = $this->db->get('barang');  //cek dulu apakah ada sudah ada kode di tabel.    
          if ($query->num_rows() <> 0) {
               //cek kode jika telah tersedia    
               $data = $query->row();
               $kode = intval($data->kode_barang) + 1;
          } else {
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
          $tgl = date('dmY');
          $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
          $kodetampil = "BR" . "5" . $tgl . $batas;  //format kode
          return $kodetampil;
     }

     public function cek_login($where)
     {
          $this->db->where($where);
          return $this->db->get('user');
     }

     public function update_brg_dsk($id)
     {
          $char = array(
               'kode_diskon' => '112345'
          );

          $where = array(
               'kode_diskon' => $id
          );

          $this->db->where($where);
          $this->db->update('barang', $char);
     }

     public function no_faktur()
     {
          $this->db->select('RIGHT(transaksi_keluar.no_faktur,2) as no_faktur', FALSE);
          $this->db->order_by('no_faktur', 'DESC');
          $this->db->limit(1);
          $query = $this->db->get('transaksi_keluar');  //cek dulu apakah ada sudah ada kode di tabel.    
          if ($query->num_rows() <> 0) {
               //cek kode jika telah tersedia    
               $data = $query->row();
               $kode = intval($data->no_faktur) + 1;
          } else {
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
          $tgl = date('dmY');
          $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
          $kodetampil = "TR" . "5" . $tgl . $batas;  //format kode
          return $kodetampil;
     }

     public function no_faktur_min()
     {
          $this->db->select('RIGHT(transaksi_keluar.no_faktur,2) as no_faktur', FALSE);
          $this->db->order_by('no_faktur', 'DESC');
          $this->db->limit(1);
          $query = $this->db->get('transaksi_keluar');  //cek dulu apakah ada sudah ada kode di tabel.    
          if ($query->num_rows() <> 0) {
               //cek kode jika telah tersedia    
               $data = $query->row();
               $kode = intval($data->no_faktur) + 1;
          } else {
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
          $tgl = date('dmY');
          $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
          $kodetampil = "TR" . "5" . $tgl . $batas;  //format kode
          return $kodetampil;
     }

     public function update_stock_kl($kode, $stock1)
     {
          $cari = array('kode_barang' => $kode);
          $query = $this->db->get_where('barang', $cari);
          $row = $query->row();

          $stock_total = $row->stock - $stock1;

          $stock = array('stock' => $stock_total);

          $where = array(
               'kode_barang' => $kode
          );

          $this->db->where($where);
          $this->db->update('barang', $stock);
     }

     public function show_print()
     {
          $this->db->join('detail_transkeluar', 'detail_transkeluar.id_transaksi = transaksi_keluar.no_faktur');
          $this->db->order_by('no_faktur', 'DESC');
          $this->db->limit(1);
          return $this->db->get('transaksi_keluar');
     }

     public function barang_beli($where)
     {
          $this->db->where('id_transaksi', $where);
          $this->db->join('barang', 'barang.kode_barang = detail_transkeluar.kode_barang');
          return $this->db->get('detail_transkeluar');
     }

     public function data_toko()
     {
          //$this->db->limit(1);
          return $this->db->get_where('website', ['id_option' => 1])->row();
     }

     public function update_option($where, $data)
     {
          $this->db->where($where);
          $this->db->update('website', $data);
     }

     public function pengaturan_print()
     {
          return $this->db->get('website');
     }
}
