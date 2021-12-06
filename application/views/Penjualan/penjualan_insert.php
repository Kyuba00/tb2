<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header"><strong>Tambah Penjualan</strong></div>
                <div class="card-body">
                    <form method="post" action="<?php echo site_url('penjualan/insert_submit/'); ?>">
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
                                <label for="harga_jual"><strong>Harga Barang</strong></label>
                                <input type="number" name="harga_jual" value="" class="form-control" readonly>
                            </div>
                            <div class="form-group col-2">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" value="" class="form-control" min='1'>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>