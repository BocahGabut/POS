<div class="row">
    <?php
    if ($barang > 0) {
        ?>

        <?php
            foreach ($barang as $u) {
                ?>

            <div class="col-md-4">
                <label>Nama Barang</label>
                <div class="form-label-group">
                    <input type="text" name="kode_barang" value="<?php echo $u->kode_barang ?>" class="form-control" placeholder="Nama Barang" hidden>
                    <input type="text" name="nama_barang" value="<?php echo $u->nama_barang ?>" class="form-control" placeholder="Nama Barang" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <label>Harga Barang</label>
                <div class="form-label-group">
                    <input type="text" name="harga" value="<?php echo $u->harga_jual ?>" class="form-control" placeholder="Harga" readonly>
                </div>
            </div>
            <?php
                    $tgl = date("Y-m-d");
                    if ($u->type_diskon == '1' && $tgl >= $u->tgl_awal && $tgl <= $u->tgl_akhir) { ?>
                <div class="col-md-2">
                    <label>Diskon</label>
                    <div class="form-label-group">
                        <input value="Buy <?php echo $u->ketentuan ?> Get <?php echo $u->item ?>" type="text" name="diskon" class="form-control" placeholder="Diskon" readonly>
                        <input value="<?php echo $u->item ?>" type="text" name="ket" class="form-control" placeholder="Diskon" hidden>
                        <input value="<?php echo $u->ketentuan ?>" type="text" name="buy" class="form-control" placeholder="Diskon" hidden>
                    </div>
                </div>
            <?php } ?>
            <?php
                    $tgl = date("Y-m-d");
                    if ($u->type_diskon == '2' && $tgl >= $u->tgl_awal && $tgl <= $u->tgl_akhir) { ?>
                <div class="col-md-2">
                    <label>Diskon(%)</label>
                    <div class="form-label-group">
                        <input value="<?php echo $u->persen ?>" type="text" name="diskon" class="form-control" placeholder="Diskon" readonly>
                    </div>
                </div>
            <?php } ?>
            <?php
                    $tgl = date("Y-m-d");
                    if ($u->type_diskon == '3') { ?>
                <div class="col-md-2">
                    <label>Diskon</label>
                    <div class="form-label-group">
                        <input value="0" type="text" name="diskon" class="form-control" placeholder="Diskon" readonly>
                    </div>
                </div>
            <?php } else if ($u->type_diskon == '2' && $tgl > $u->tgl_akhir) { ?>
                <div class="col-md-2">
                    <label>Diskon</label>
                    <div class="form-label-group">
                        <input value="0" type="text" name="diskon" class="form-control" placeholder="Diskon" readonly>
                    </div>
                </div>
            <?php } ?>
            <input type="text" name="type_dsk" value="<?php echo $u->type_diskon ?>" class="form-control" hidden>
            <div class="col-md-1">
                <label>Stock</label>
                <div class="form-label-group">
                    <input type="text" name="stock" value="<?php echo $u->stock ?>" class="form-control" placeholder="Stock" readonly>
                </div>
            </div>

            <?php
                    if ($u->type_diskon == '3') { ?>
                <div class="col-md-1">
                    <label>Qty</label>
                    <div class="form-label-group">
                        <input data-validation-containsnumber-message="Tidak Boleh Melebihi Stock" data-validation-containsnumber-regex="([^0-9]*[0-9]+)+" type="number" name="qty" max="<?php echo $u->stock ?>" value="1" class="form-control" placeholder="QTY">
                    </div>
                </div>
            <?php } ?>
            <?php
                    if ($u->type_diskon == '1' or $u->type_diskon == '2') { ?>
                <div class="col-md-1">
                    <label>Qty</label>
                    <div class="form-label-group">
                        <input data-validation-containsnumber-message="Tidak Boleh Melebihi Stock" data-validation-containsnumber-regex="([^0-9]*[0-9]+)+" type="number" name="qty" max="<?php echo $u->stock ?>" value="1" class="form-control" placeholder="QTY">
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-1">
                <label></label>
                <a><button type="submit" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-shopping-cart"></i></button></a>
            </div>

        <?php } ?>

    <?php } ?>

</div>