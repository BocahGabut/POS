<!-- ######################################################################################### -->
<div class="modal-size-lg mr-1 mb-1 d-inline-block">
    <div class="modal fade text-left" id="modal_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Transaksi Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" method="post" action="<?php echo base_url(); ?>admin/transaksi/save_tras_masuk">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label>Nama Barang</label>
                                    <div class="form-label-group">
                                        <select name="barang" class="form-control round" required>
                                            <option value="" disabled selected>~~ Silahkan Pilih ~~</option>
                                            <?php
                                            foreach ($barang as $u) {
                                                ?>
                                                <option value="<?php echo $u->kode_barang ?>"><?php echo $u->nama_barang ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Stock</label>
                                    <div class="form-label-group">
                                        <input type="number" name="stock" class="form-control round" placeholder="Stock">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ######################################################################################### -->