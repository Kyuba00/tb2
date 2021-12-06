<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong>Tambah Barang</strong>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo site_url('barang/insert_submit/'); ?>" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kategori_barang">
                                            <strong>Kategori Barang</strong>
                                        </label>
                                        <select name="kategori_id" class="form-control">
                                            <?php foreach ($data_kategori as $kategori) : ?>
                                                <option value="<?php echo $kategori['id']; ?>">
                                                    <?php echo $kategori['nama']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama"><strong>Nama Barang</strong></label>
                                        <input type="text" name="nama" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="harga_beli"><strong>Harga Beli</strong></label>
                                        <input type="number" name="harga_beli" value="" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="harga_jual"><strong>Harga Jual</strong></label>
                                        <input type="number" name="harga_jual" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="stock"><strong>Stock</strong></label>
                                        <input type="number" name="stock" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Batal</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>