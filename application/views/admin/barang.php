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
                                                    <th>Nama Barang</th>
                                                    <th>Harga Jual</th>
                                                    <th>Harga Beli</th>
                                                    <th>Stock</th>
                                                    <th>Kategori</th>
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
                                                        <td><?php echo $u->nama_barang ?></td>
                                                        <td>Rp. <?php echo number_format($u->harga_jual); ?></td>
                                                        <td>Rp. <?php echo number_format($u->harga_beli) ?></td>
                                                        <td><?php echo $u->stock ?> <?php echo $u->satuan ?></td>
                                                        <td><?php echo $u->nama_kategori ?></td>
                                                        <td>
                                                            <a data-placement="top" title="Edit" data-toggle="tooltip" class="mb-6 btn-floating waves-effect waves-light cyan">
                                                                <button type="button" data-target="#modal_edit<?php echo $u->kode_barang ?>" data-toggle="modal" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <a onclick="delete_message('<?php echo $u->kode_barang ?>','<?php echo base_url(); ?>admin/barang/delete')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                                                <button data-toggle="tooltip" data-placement="top" title="Delete" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
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
                    window.location.href = "<?php echo base_url(); ?>admin/barang";
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
$this->load->view('form/modal_barang');
$this->load->view('_partial/footer');
?>