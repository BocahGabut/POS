<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partial/header_kasir');
?>

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static " data-open="hover" data-menu="horizontal-menu" data-col="4-columns">
    <div class="content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <?php echo $this->session->flashdata('pesan') ?>
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <form method="post" action="<?php echo base_url(); ?>kasir/transmasuk/add_cart">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="col-12">
                                                    <label>Kode Barang</label>
                                                    <div class="form-label-group">
                                                        <input id="kode" type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="detail_barang" class="col-md-9">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Keranjang</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>QTY</th>
                                                    <th>Diskon</th>
                                                    <th>Harga</th>
                                                    <th>Sub Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php $i = 1;
                                                    $no = 1; ?>

                                                    <?php foreach ($this->cart->contents() as $items) : ?>

                                                <tr>
                                                    <form method="post" action="<?php echo base_url(); ?>kasir/transmasuk/update_qty">
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $items['name']; ?></td>
                                                        <td>
                                                            <input value="<?php echo $items['id']; ?>" type="text" name="kode_barang" class="form-control col-md-5" hidden>
                                                            <input value="<?php echo $items['rowid']; ?>" type="text" name="rowid" class="form-control col-md-5" hidden>
                                                            <input value="<?php echo $items['ket']; ?>" type="text" name="buy" class="form-control col-md-5" hidden>
                                                            <input value="<?php echo $items['free']; ?>" type="text" name="ket" class="form-control col-md-5" hidden>
                                                            <input name="harga" value="<?php echo $items['price']; ?>" hidden>
                                                            <input value="<?php echo $items['type_dsk']; ?>" type="text" name="type" class="form-control col-md-5" hidden>
                                                            <input name="type_dsk" value="<?php echo $items['type_dsk']; ?>" hidden>
                                                            <input data-validation-containsnumber-message="Tidak Boleh Melebihi Stock" data-validation-containsnumber-regex="([^0-9]*[0-9]+)+" max="<?php echo $items['all_stock']; ?>" value="<?php echo $items['qty_dsk']; ?>" type="number" name="qty_update" class="form-control col-md-5">
                                                            <input name="qty" value="<?php echo $items['qty_dsk']; ?>" hidden>
                                                        </td>
                                                        <?php
                                                        if ($items['type_dsk'] == '1') { ?>
                                                            <td><?php echo "Buy " . $items['ket'] . " Get " . $items['free']  ?></td>
                                                        <?php } else if ($items['type_dsk'] == '2') { ?>
                                                            <td><?php echo $items['diskon']  ?>%</td>
                                                        <?php } else { ?>
                                                            <td>0</td>
                                                        <?php } ?>
                                                        <td><?php echo $this->cart->format_number($items['harga']); ?>
                                                            <input name="harga" value="<?php echo $items['harga']; ?>" hidden></td>
                                                        <td><?php echo $this->cart->format_number($items['subtotal']); ?>
                                                            <input name="subtotal" value="<?php echo $items['subtotal']; ?>" hidden></td>
                                                        <td>
                                                            <a class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                                                <button type="submit" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <a href="<?php echo base_url() . 'kasir/transmasuk/removeCartItem/' . $items['rowid']; ?>" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                                                <button type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-close"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </form>
                                                </tr>

                                                <?php $i++; ?>

                                            <?php endforeach; ?>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Transaksi</h4>
                                <a onclick="logout_message()" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                    <button data-toggle="tooltip" data-placement="top" title="Logout" type="button" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1"><i class="fa fa-sign-out"></i></button>
                                </a>
                            </div>
                            <div class="card-content">
                                <form id="form_bayar">
                                    <div class="card-body ">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <h5>Total Belanja (Rp.)</h5>
                                                <input value="<?php echo $this->cart->total(); ?>" id="total" type="text" name="total_belanja" class="form-control" readonly>
                                                <input value="<?php echo $no_fak ?>" name="id" id="id_transaksi" type="text" class="form-control" readonly hidden>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <h5>Kembalian (Rp.)</h5>
                                                <input value="0" name="kembalian" id="kembalian" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <h5>Tunai (Rp.)</h5>
                                                <input name="tunai" onkeyup="sum(this);" id="jml_uang" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="<?= base_url('kasir/transmasuk/removeall'); ?>">
                                                    <button type="button" class="btn btn-primary">New</button>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a>
                                                    <button type="button" onclick="bayar('<?= base_url('kasir/transmasuk/save'); ?>','<?php echo $no_fak ?>')" class="btn btn-primary">Check Out</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $this->load->view('form/modal_struk');
    $this->load->view('_partial/footer_kasir');
    ?>
    <script type="text/javascript">
        function sum() {
            var txtFirstNumberValue = document.getElementById('jml_uang').value;
            var txtSecondNumberValue = document.getElementById('total').value;
            var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('kembalian').value = result;
            }
        }

        function bayar(url, id) {
            event.preventDefault();
            $.ajax({
                url: url,
                data: $('#form_bayar').serialize(),
                type: "post",
                async: false,
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        type: "success",
                        title: "Success!",
                        text: "Pembayaran Success Dilakukan",
                        confirmButtonClass: "btn btn-success"
                    }).then(function(t) {
                        //var id = document.getElementById("id_transaksi");
                        data_print('id')
                    });
                }
            });
        }

        function data_print(id) {
            $.ajax({
                url: "<?php echo base_url(); ?>kasir/transmasuk/print",
                data: {
                    id: id
                },
                type: "post",
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('#modal').modal('show');
                    for (var i = 0; i < data.length; i++) {
                        document.getElementById("no_faktur").innerText = '' + data[i].no_faktur;
                        document.getElementById("print_subtotal").innerText = '' + data[i].total_transaksi;
                        document.getElementById("print_bayar").innerText = '' + data[i].bayar;
                        document.getElementById("print_kembalian").innerText = '' + data[i].kembalian;
                        var id = '' + data[i].no_faktur;
                        data_barang(id);
                        //console.log(data[i].no_faktur);
                    }
                }
            });
        }

        function data_barang(id_transaksi) {
            $.ajax({
                url: "<?php echo base_url(); ?>kasir/transmasuk/barang_beli",
                data: {
                    id: id_transaksi
                },
                type: "post",
                async: false,
                dataType: 'json',
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        document.getElementById("print_table").innerHTML +=
                            '<tr>' +
                            '<td>' + data[i].nama_barang + '</td>' +
                            '<td>' + data[i].harga_jual + '</td>' +
                            '<td>' + data[i].qty + '</td>' +
                            '</tr>';
                    }
                }
            });
        }

        function logout_message() {
            event.preventDefault();
            Swal.fire({
                title: "Anda Yakin ?",
                text: "Akan Logout ???",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Logout!",
                confirmButtonClass: "btn btn-primary",
                cancelButtonClass: "btn btn-danger ml-1",
                buttonsStyling: !1
            }).then(function(t) {
                t.value ? Swal.fire({
                        type: "success",
                        text: "Logout Baerhasil :)",
                        confirmButtonClass: "btn btn-success"
                    }).then(function(succ) {
                        window.location.href = "<?php echo base_url(); ?>kasir/transmasuk/logout";
                    }) :
                    t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                        title: "Cancelled",
                        text: "Logout Gagal :)",
                        type: "error",
                        confirmButtonClass: "btn btn-success"
                    })
            })
        };

        function print_struck(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            //var awal_content = document.getElementById(awal).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>