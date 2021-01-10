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
                        <?php echo $this->session->flashdata('pesan') ?>
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
                                                    <th>No Faktur</th>
                                                    <th>Tgl Transaksi</th>
                                                    <th>Nama user</th>
                                                    <th>Total Transaksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($masuk as $u) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $u->no_faktur ?></td>
                                                        <td><?php echo $u->tgl_transaksi ?></td>
                                                        <td><?php echo $u->nama ?></td>
                                                        <td><?php echo $u->total_transaksi ?></td>
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