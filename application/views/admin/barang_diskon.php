<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partial/header');
?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo $title ?></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kategori</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($barang as $u) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $u->nama_barang ?></td>
                                                        <td><?php echo $u->nama_kategori ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin/diskon/update_diskon/' . $u->kode_barang . '/' . $this->uri->segment(4); ?>" data-placement="top" title="Add" data-toggle="tooltip" class="mb-6 btn-floating waves-effect waves-light cyan">
                                                                <button type="button" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-plus"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Barang Diskon</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kategori</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($barang_dsk as $u) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $u->nama_barang ?></td>
                                                        <td><?php echo $u->nama_kategori ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin/diskon/remove_kode/' . $u->kode_barang . '/' . $this->uri->segment(4); ?>" data-placement="top" title="Delete" data-toggle="tooltip" class="mb-6 btn-floating waves-effect waves-light cyan">
                                                                <button type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-close"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>

<?php
$this->load->view('_partial/footer');
?>