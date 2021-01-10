<!-- ######################################################################################### -->
<div class="modal-size-lg mr-1 mb-1 d-inline-block">
    <div class="modal fade text-left" id="modal_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" method="post" action="<?php echo base_url(); ?>admin/user/save">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <label>Username</label>
                                    <div class="form-label-group">
                                        <input type="text" name="username" class="form-control round" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>Nama User</label>
                                    <div class="form-label-group">
                                        <input type="text" name="nama" class="form-control round" placeholder="Nama" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>password</label>
                                    <div class="form-label-group">
                                        <input type="password" name="password" class="form-control round" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Level User</label>
                                    <div class="form-label-group">
                                        <select name="level" class="form-control round" required>
                                            <option value="" disabled selected>~~ Silahkan Pilih ~~</option>
                                            <option value="2">Kasir</option>
                                            <option value="1">Admin</option>
                                        </select>
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
foreach ($user as $u) {
    ?>
    <div class="modal-size-lg mr-1 mb-1 d-inline-block">
        <div class="modal fade text-left" id="modal_edit<?php echo $u->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form" method="post" action="<?php echo base_url(); ?>admin/user/update">
                        <div class="modal-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Username</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->id_user ?>" type="text" name="kode" class="form-control round" placeholder="Username" hidden>
                                            <input value="<?php echo $u->username ?>" type="text" name="username" class="form-control round" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>Nama User</label>
                                        <div class="form-label-group">
                                            <input value="<?php echo $u->nama ?>" type="text" name="nama" class="form-control round" placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>password</label>
                                        <div class="form-label-group">
                                            <input type="password" name="password" class="form-control round" placeholder="Password">
                                            <input value="<?php echo $u->password ?>" type="password" name="old_password" class="form-control round" placeholder="Password" hidden>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Level User</label>
                                        <div class="form-label-group">
                                            <select name="level" class="form-control round" required>
                                                <?php if ($u->level == "1") { ?>
                                                    <option value="1">Admin</option>
                                                <?php } else { ?>
                                                    <option value="2">Kasir</option>
                                                <?php } ?>
                                                <option value="2">Kasir</option>
                                                <option value="1">Admin</option>
                                            </select>
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