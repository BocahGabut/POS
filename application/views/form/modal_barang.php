<!-- ######################################################################################### -->
<div class="modal-size-lg mr-1 mb-1 d-inline-block">
    <div class="modal fade text-left" id="modal_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Tambah Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" method="post" action="<?php echo base_url(); ?>admin/barang/save">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <label>Nama Barang</label>
                                    <div class="form-label-group">
                                        <input type="text" name="barang" class="form-control round" placeholder="Nama Barang" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Kategori Barang</label>
                                    <div class="form-label-group">
                                        <select name="kategori" class="form-control round" required>
                                            <option value="" disabled selected>~~ Silahkan Pilih ~~</option>
                                            <?php
                                            foreach ($kategori as $u) {
                                                ?>
                                                <option value="<?php echo $u->kode_kategori ?>"><?php echo $u->nama_kategori ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Satuan Barang</label>
                                    <div class="form-label-group">
                                        <select name="satuan" class="form-control round" required>
                                            <option value="" disabled selected>~~ Silahkan Pilih ~~</option>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Minimal Stock</label>
                                    <div class="form-label-group">
                                        <input type="number" name="min" class="form-control round" placeholder="Minimal Stock" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Maks Stock</label>
                                    <div class="form-label-group">
                                        <input type="number" name="maks" class="form-control round" placeholder="Maks Stock" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Harga Beli</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input name="hrg_beli" type="text" class="form-control round" placeholder="Harga Beli" aria-describedby="basic-addon1"  required>
                                    </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Harga Jual</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input name="hrg_jual" type="text" class="form-control round" placeholder="Harga Jual" aria-describedby="basic-addon1"  required>
                                    </div>
                                    </fieldset>
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
<?php
foreach ($barang as $u) {

    ?>
    <div class="modal-size-lg mr-1 mb-1 d-inline-block">
        <div class="modal fade text-left" id="modal_edit<?php echo $u->kode_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Edit Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form" method="post" action="<?php echo base_url(); ?>admin/barang/update">
                        <div class="modal-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Nama Barang</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->kode_barang ?>" type="text" name="kode" class="form-control round" hidden>
                                            <input value="<?php echo $u->nama_barang ?>" type="text" name="barang" class="form-control round" placeholder="Nama Barang" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Kategori Barang</label>
                                        <div class="form-label-group">
                                            <select name="kategori" class="form-control round" required>
                                                <option value="<?php echo $u->kode_kategori ?>"><?php echo $u->nama_kategori ?></option>
                                                <?php
                                                    foreach ($kategori as $kat) {
                                                        ?>
                                                    <option value="<?php echo $kat->kode_kategori ?>"><?php echo $kat->nama_kategori ?></option>
                                                <?php
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Satuan Barang</label>
                                        <div class="form-label-group">
                                            <select name="satuan" class="form-control round" required>
                                                <option value="<?php echo $u->satuan ?>"><?php echo $u->satuan ?></option>
                                                <option>Unit</option>
                                                <option>Kotak</option>
                                                <option>Botol</option>
                                                <option>Butir</option>
                                                <option>Buah</option>
                                                <option>Biji</option>
                                                <option>Sachet</option>
                                                <option>Bks</option>
                                                <option>Roll</option>
                                                <option>PCS</option>
                                                <option>Box</option>
                                                <option>Meter</option>
                                                <option>Centimeter</option>
                                                <option>Liter</option>
                                                <option>CC</option>
                                                <option>Mililiter</option>
                                                <option>Lusin</option>
                                                <option>Gross</option>
                                                <option>Kodi</option>
                                                <option>Rim</option>
                                                <option>Dozen</option>
                                                <option>Kaleng</option>
                                                <option>Lembar</option>
                                                <option>Helai</option>
                                                <option>Gram</option>
                                                <option>Kilogram</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Minimal Stock</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->min_stock ?>" type="number" name="min" class="form-control round" placeholder="Minimal Stock" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Maks Stock</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->max_stock ?>" type="number" name="maks" class="form-control round" placeholder="Maks Stock" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Harga Beli</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input value="<?php echo $u->harga_beli ?>" name="hrg_beli" type="text" class="form-control round" placeholder="Harga Beli" aria-describedby="basic-addon1" required>
                                        </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Harga Jual</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input value="<?php echo $u->harga_jual ?>" name="hrg_jual" type="text" class="form-control round" placeholder="Harga Jual" aria-describedby="basic-addon1" required>
                                        </div>
                                        </fieldset>
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
<?php
} ?>