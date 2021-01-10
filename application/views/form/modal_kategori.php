<!-- ######################################################################################### -->
<div class="modal-size-lg mr-1 mb-1 d-inline-block">
    <div class="modal fade text-left" id="modal_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Tambah Data Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" method="post" action="<?php echo base_url(); ?>admin/kategori/save">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-label-group">
                                        <input type="text" name="kategori" class="form-control" placeholder="Nama Kategori" required>
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
<?php
foreach ($kategori as $u) {
    ?>
    <div class="modal-size-lg mr-1 mb-1 d-inline-block">
        <div class="modal fade text-left" id="edit<?php echo $u->kode_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Edit Data Kategori</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form" method="post" action="<?php echo base_url(); ?>admin/kategori/update">
                        <div class="modal-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->kode_kategori ?>" type="text" name="kode_kategori" class="form-control" hidden>
                                            <input value="<?php echo $u->nama_kategori ?>" type="text" name="kategori" class="form-control" placeholder="Nama Kategori">
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
<?php
}
?>