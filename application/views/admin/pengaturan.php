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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <form class="form" method="post" action="<?php echo base_url(); ?>admin/pengaturan/update">
                                        <div class="modal-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label>Nama Toko</label>
                                                        <div class="form-label-group">
                                                            <input type="text" name="nama" class="form-control" placeholder="Nama Kategori" required value="<?= $toko->nama_toko; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>No Telephone Toko</label>
                                                        <div class="form-label-group">
                                                            <input type="text" name="tlpn" class="form-control" placeholder="Nama Kategori" required value="<?= $toko->no_tlpn; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Ucapan Terima Kasih</label>
                                                        <div class="form-label-group">
                                                            <input type="text" name="salam" class="form-control" placeholder="Nama Kategori" required value="<?= $toko->salam; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Nama Toko</label>
                                                        <div class="form-label-group">
                                                            <textarea name="alamat" class="form-control"><?= $toko->alamat ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
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