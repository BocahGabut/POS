<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partial/header');
?>
<div class="app-content content">
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
                                <a><button data-toggle="modal" data-target="#modal_save" type="button" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-plus"></i>Tambah</button></a>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Username</th>
                                                    <th>Nama</th>
                                                    <th>Level</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($user as $u) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $u->username ?></td>
                                                        <td><?php echo $u->nama ?></td>
                                                        <td>
                                                            <?php if ($u->level == "1") { ?>
                                                                <div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Admin</div>
                                                            <?php } else { ?>
                                                                <div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Kasir</div>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a data-placement="top" title="Edit" data-toggle="tooltip" class="mb-6 btn-floating waves-effect waves-light cyan">
                                                                <button type="button" data-target="#modal_edit<?php echo $u->id_user ?>" data-toggle="modal" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <a onclick="delete_message('<?php echo $u->id_user ?>','<?php echo base_url(); ?>admin/user/delete')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                                                <button data-toggle="tooltip" data-placement="top" title="Delete" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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

<script type="text/javascript">
    function delete_message(id, url) {
        event.preventDefault();
        Swal.fire({
            title: "Anda Yakin ?",
            text: "Akan Menghapus Data Ini !",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            confirmButtonClass: "btn btn-primary",
            cancelButtonClass: "btn btn-danger ml-1",
            buttonsStyling: !1
        }).then(function(t) {
            t.value ? Swal.fire({
                    type: "success",
                    title: "Deleted!",
                    text: "Data Berhasil Di Hapus",
                    confirmButtonClass: "btn btn-success"
                }).then(function(succ) {
                    $.ajax({
                        url: url,
                        type: "post",
                        data: {
                            id: id
                        }
                    });
                    window.location.href = "<?php echo base_url(); ?>admin/user";
                }) :
                t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                    title: "Cancelled",
                    text: "Data Tidak Dihapus :)",
                    type: "error",
                    confirmButtonClass: "btn btn-success"
                })
        })
    };
</script>

<?php
$this->load->view('form/modal_user');
$this->load->view('_partial/footer');
?>