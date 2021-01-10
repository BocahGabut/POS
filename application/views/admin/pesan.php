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
                                <h4 class="card-title">Barang Mulai Habis</h4>
                                <?php
                                $result = $this->db->get_where('barang', 'stock <= min_stock');
                                if ($result->num_rows() <> 0) {
                                    ?>
                                    <span class="badge badge-danger badge-pill float-right"><?php echo $result->num_rows() ?></span>
                                <?php } ?>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <?php
                                    foreach ($barang as $brg) {
                                        ?>
                                        <?php if ($brg->stock <= $brg->min_stock) {
                                                ?>
                                            <div class="alert alert-danger mb-2" role="alert">
                                                <strong><?php echo $brg->nama_barang ?></strong> Barang Sudah Mulai Habis. (<?php echo $brg->stock ?>) Dari Batas Minimal (<?php echo $brg->min_stock ?>)
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Barang Melebihi Batas</h4>
                                <?php
                                $result = $this->db->get_where('barang', 'stock >= max_stock');
                                if ($result->num_rows() <> 0) {
                                    ?>
                                    <span class="badge badge-warning badge-pill float-right"><?php echo $result->num_rows() ?></span>
                                <?php } ?>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <?php
                                    foreach ($barang as $brg2) {
                                        ?>
                                        <?php if ($brg2->stock > $brg2->max_stock) {
                                                ?>
                                            <div class="alert alert-warning mb-2" role="alert">
                                                <strong><?php echo $brg2->nama_barang ?></strong> Barang Melebihi Batas Maksimal (<?php echo $brg2->stock ?>) Dari Batas Maksimal (<?php echo $brg2->max_stock ?>)
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
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