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
                <form class="form" method="post" action="<?php echo base_url(); ?>toko/save_kera">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Satuan</th>
                                        <th>Stock</th>
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
                                            <td><input name="nama" value="<?php echo $u->kode_barang ?>" hidden /><?php echo $u->nama_barang ?></td>
                                            <td><input name="harga" value="<?php echo $u->harga_jual ?>" hidden /><?php echo $u->harga_jual ?></td>
                                            <td><?php echo $u->stock ?></td>
                                            <td>
                                                <button type="submit" data-toggle="tooltip" data-placement="top" type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="fa fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>