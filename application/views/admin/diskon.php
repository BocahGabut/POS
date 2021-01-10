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
                                                    <th>Nama Diskon</th>
                                                    <th>Diskon</th>
                                                    <th>Mulai Tanggal</th>
                                                    <th>Tanggal Akhir</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($diskon as $u) {
                                                    ?>
                                                    <?php
                                                        if ($u->type_diskon == '1' or $u->type_diskon == '2') {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $u->nama_diskon ?></td>
                                                            <?php
                                                                    if ($u->type_diskon == '2') {
                                                                        ?>
                                                                <td><?php echo $u->persen ?>%</td>
                                                            <?php } ?>
                                                            <?php
                                                                    if ($u->type_diskon == '1') {
                                                                        ?>
                                                                <td>Beli <?php echo $u->ketentuan ?>
                                                                    Gratis
                                                                    <?php echo $u->item ?>
                                                                </td>
                                                            <?php } ?>
                                                            <td><?php echo $u->tgl_awal ?></td>
                                                            <td><?php echo $u->tgl_akhir ?></td>
                                                            <td><?php echo $u->keterangan ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url() . 'admin/diskon/detail/' . $u->kode_diskon ?>" data-placement="top" title="Detail" data-toggle="tooltip" class="mb-6 btn-floating waves-effect waves-light cyan">
                                                                    <button type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="fa fa-info"></i>
                                                                    </button>
                                                                </a>
                                                                <a onclick="delete_message('<?php echo $u->kode_diskon ?>','<?php echo base_url(); ?>admin/diskon/delete')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                                                    <button data-toggle="tooltip" data-placement="top" title="Delete" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-trash"></i>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
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
                    window.location.href = "<?php echo base_url(); ?>admin/diskon";
                }) :
                t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                    title: "Cancelled",
                    text: "Data Tidak Dihapus :)",
                    type: "error",
                    confirmButtonClass: "btn btn-success"
                })
        })
    };

    function showhide() {
        if (document.getElementById('select_type').value == 2) {
            document.getElementById('pengurangan').style.display = 'block';
            document.getElementById('freeitem').style.display = 'none';
            document.getElementById('ket').style.display = 'none';
            document.getElementById('ketentuan').style.display = 'none';
        } else if (document.getElementById('select_type').value == 1) {
            document.getElementById('freeitem').style.display = 'block';
            document.getElementById('pengurangan').style.display = 'none';
            document.getElementById('ket').style.display = 'block';
            document.getElementById('ketentuan').style.display = 'block';
        }
    };

    function show_hide_edit() {
        if (document.getElementById('select_type_edit').value == 1) {
            document.getElementById('pengurangan_edit').style.display = 'block';
            document.getElementById('freeitem_edit').style.display = 'none';
            document.getElementById('ket_edit').style.display = 'none';
            document.getElementById('ketentuan_edit').style.display = 'none';
        } else if (document.getElementById('select_type_edit').value == 2) {
            document.getElementById('freeitem_edit').style.display = 'block';
            document.getElementById('pengurangan_edit').style.display = 'none';
            document.getElementById('ket_edit').style.display = 'block';
            document.getElementById('ketentuan_edit').style.display = 'block';
        }
    };
</script>

<?php
$this->load->view('form/modal_diskon');
$this->load->view('_partial/footer');
?>