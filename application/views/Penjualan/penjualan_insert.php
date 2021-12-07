<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header"><strong>Tambah Penjualan</strong></div>
                <div class="card-body">
                    <form method="post" action="<?php echo site_url('penjualan/insert_submit/'); ?>">
                        <div class="form-row">
                            <div class="form-group col-2">
                                <label>Tanggal Penjualan</label>
                                <input type="text" name="tgl_penjualan" value="<?= date('d/m/Y') ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-2">
                                <label>Jam</label>
                                <input type="text" name="jam_penjualan" value="<?= date('H:i:s') ?>" readonly class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-2">
                                <label for="Nama Barang">
                                    <strong>Nama Barang</strong>
                                </label>
                                <select name="id" class="form-control">
                                    <option value="">Pilih Barang</option>
                                    <?php foreach ($data_barang as $barang) : ?>
                                        <option value="<?php echo $barang['id']; ?>">
                                            <?php echo $barang['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label for="harga_barang"><strong>Harga Barang</strong></label>
                                <input type="number" name="harga_barang" value="" class="form-control">
                            </div>
                            <div class="form-group col-2">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" value="" class="form-control" min='1'>
                            </div>
                            <div class="form-group col-1">
                                <label for="">&nbsp;</label>
                                <button type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="keranjang">
                            <h5>Detail Pembelian</h5>
                            <hr>
                            <table class="table table-bordered" id="keranjang">
                                <thead>
                                    <tr>
                                        <td width="35%">Nama Barang</td>
                                        <td width="15%">Harga</td>
                                        <td width="15%">Jumlah</td>
                                        <td width="10%">Sub Total</td>
                                        <td width="15%">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" align="right"><strong>Total : </strong></td>
                                        <td id="total"></td>

                                        <td>
                                            <input type="hidden" name="total_hidden" value="">
                                            <input type="hidden" name="max_hidden" value="">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
                $('tfoot').hide()

                $(document).keypress(function(event) {
                    if (event.which == '13') {
                        event.preventDefault();
                    }
                })

                $(document).on('click', '#tambah', function(e) {
                        const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
                        const data_keranjang = {
                            nama_barang: $('select[name="nama_barang"]').val(),
                            harga_barang: $('input[name="harga_barang"]').val(),
                            jumlah: $('input[name="jumlah"]').val(),
                            satuan: $('input[name="satuan"]').val(),
                            sub_total: $('input[name="sub_total"]').val(),
                        }
                    )
                }
</script>