<!-- ######################################################################################### -->
<div class="modal-size-lg mr-1 mb-1 d-inline-block">
    <div class="modal fade text-left" id="modal_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Tambah Data Diskon</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" method="post" action="<?php echo base_url(); ?>admin/diskon/save">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <label>Jenis Diskon</label>
                                    <div class="form-label-group">
                                        <select onclick="showhide()" id="select_type" name="jenis_diskon" class="form-control round" required>
                                            <option value="" disabled selected>~~ Silahkan Pilih ~~</option>
                                            <option value="1">Free Item</option>
                                            <option value="2">Potongan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <label>Nama Diskon</label>
                                    <div class="form-label-group">
                                        <input type="text" name="nama_diskon" class="form-control round" placeholder="Nama Diskon" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <label>Tgl Diskon Awal</label>
                                    <div class="form-label-group">
                                        <input value="<?php echo date("Y-m-d"); ?>" type="date" name="tgl_awal" class="form-control round" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <label>Tgl Diskon Akhir</label>
                                    <div class="form-label-group">
                                        <input type="date" name="tgl_akhir" class="form-control round" required>
                                    </div>
                                </div>
                                <div style="display:none;" id="pengurangan" class="col-12">
                                    <label>Persentase Diskon</label>
                                    <div class="input-group">
                                        <input name="persen" type="number" class="form-control round" placeholder="Persentase Diskon" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:none;" id="ketentuan" class="col-md-6 col-12">
                                    <label>Ketentuan Item</label>
                                    <div class="form-label-group">
                                        <input type="text" name="ketentuan" class="form-control round" placeholder="Ketentuan Item">
                                    </div>
                                </div>
                                <div style="display:none;" id="freeitem" class="col-md-6 col-12">
                                    <label>Free Item</label>
                                    <div class="form-label-group">
                                        <input type="text" name="free_item" class="form-control round" placeholder="Free Item">
                                    </div>
                                </div>
                                <div style="display:none;" id="ket" class="col-12">
                                    <label>Keterangan</label>
                                    <textarea class="form-control round" name="ket" rows="3" placeholder="Keterangan"></textarea>
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
foreach ($diskon as $u) {

    ?>
    <div class="modal-size-lg mr-1 mb-1 d-inline-block">
        <div class="modal fade text-left" id="edit<?php echo $u->kode_diskon ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Edit Data Diskon</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form" method="post" action="<?php echo base_url(); ?>admin/diskon/save">
                        <div class="modal-body">
                            <div class="form-body">
                                <h4>Keterangan</h4>
                                <ul>
                                    <li>
                                        <font style="color: red;">
                                            ika Ingin Menggunakan Kupon Silahkan Pliih Ya Dan Masukan Kode Kupon
                                        </font>
                                    </li>
                                </ul>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Jenis Diskon</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->kode_diskon ?>" hidden />
                                            <select onclick="show_hide_edit()" id="select_type_edit" name="jenis_diskon" class="form-control round" required>
                                                <?php
                                                    if ($u->type_diskon == 2) {
                                                        ?>
                                                    <option value="2">Potongan</option>
                                                <?php } ?>
                                                <?php
                                                    if ($u->type_diskon == 1) {
                                                        ?>
                                                    <option value="1">Free Item</option>
                                                <?php } ?>
                                                <option value="2">Potongan</option>
                                                <option value="1">Potongan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <label>Nama Diskon</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->nama_diskon ?>" type="text" name="nama_diskon" class="form-control round" placeholder="Nama Diskon" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <label>Tgl Diskon Awal</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->tgl_awal ?>" type="date" name="tgl_awal" class="form-control round" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <label>Tgl Diskon Akhir</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->tgl_akhir ?>" type="date" name="tgl_akhir" class="form-control round" required>
                                        </div>
                                    </div>
                                    <div style="display:none;" id="pengurangan_edit" class="col-12">
                                        <label>Persentase Diskon</label>
                                        <div class="input-group">
                                            <input value="<?php echo $u->persen ?>" name="persen" type="number" class="form-control round" placeholder="Persentase Diskon" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display:none;" id="ketentuan_edit" class="col-md-6 col-12">
                                        <label>Ketentuan Item</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->ketentuan ?>" type="text" name="ketentuan" class="form-control round" placeholder="Ketentuan Item">
                                        </div>
                                    </div>
                                    <div style="display:none;" id="freeitem_edit" class="col-md-6 col-12">
                                        <label>Free Item</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->item ?>" type="text" name="free_item" class="form-control round" placeholder="Free Item">
                                        </div>
                                    </div>
                                    <div style="display:none;" id="ket_edit" class="col-12">
                                        <label>Keterangan</label>
                                        <textarea class="form-control round" name="ket" rows="3" placeholder="Keterangan"><?php echo $u->keterangan ?></textarea>
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
<?php
} ?>