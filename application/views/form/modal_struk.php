<div class="modal-size-lg mr-1 mb-1 d-inline-block">
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Page Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                foreach ($website as $wb) {
                ?>
                    <div class="modal-body" id="print_content">
                        <center>
                            <h5><?php echo $wb->nama_toko ?></h5>
                            <h6><?php echo $wb->alamat ?></h6>
                            <h6><?php echo '( ' . $wb->no_tlpn . ' )' ?></h6>
                            <h6 id="no_faktur"></h6>
                            <h6>Transaksi</h6>
                        </center>
                        <div style="border-style: dashed; border-width: 0.5px; border-color:black;" class="mb-1 mt-2">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6 class="ml-2">Time </h6>
                            </div>
                            <div class="col-6">
                                <h6 class="ml-4"><?php date_default_timezone_set('asia/jakarta');
                                                    $time = time();
                                                    echo date('Y/m/d H:i:s', $time) ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6 class="ml-2">Kasir </h6>
                            </div>
                            <div class="col-6">
                                <h6 class="ml-4">
                                    <?php
                                    $this->db->where('id_user', $kd_user = $this->session->userdata('id_user'));
                                    $result = $this->db->get('user');

                                    foreach ($result->result() as $rs) {
                                        echo $rs->nama;
                                    }
                                    ?>
                                </h6>
                            </div>
                        </div>
                        <div class="mt-2 mb-1" style="border-style: dashed; border-width: 0.5px; border-color:black;">
                        </div>
                        <div class="row ml-1 mr-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td>Harga Satuan</td>
                                        <td>QTY</td>
                                    </tr>
                                </thead>
                                <tbody id="print_table">
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-1 mb-1" style="border-style: dashed; border-width: 0.5px; border-color:black;">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6 class="ml-2">Subtotal </h6>
                            </div>
                            <div class="col-6">
                                <h6 id="print_subtotal"></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6 class="ml-2">Bayar </h6>
                            </div>
                            <div class="col-6">
                                <h6 id="print_bayar"></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6 class="ml-2">Kembalian </h6>
                            </div>
                            <div class="col-6">
                                <h6 id="print_kembalian"></h6>
                            </div>
                        </div>
                        <div class="mt-1 mb-1" style="border-style: dashed; border-width: 0.5px; border-color:black;">
                            <center class="mt-1">
                                <h5><?= $wb->salam ?></h5>
                            </center>
                        </div>
                    <?php } ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="print_struck('print_content');">Print</button>
                    </div>
                    </div>
            </div>
        </div>
    </div>