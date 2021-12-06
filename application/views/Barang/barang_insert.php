<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong>Daftar Barang</strong>
                            <div class="float-right">
                                <a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('barang/insert_submit/'); ?>" enctype="multipart/form-data" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kategori_barang">
                                            <strong>Kategori Barang</strong>
                                        </label>
                                        <select name="kategori_id" class="form-control">
                                            <?php foreach ($data_kategori_barang as $kategori) : ?>
                                                <option value="<?php echo $kategori['id']; ?>">
                                                    <?php echo $kategori['nama']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama"><strong>Nama Barang</strong></label>
                                        <input type="text" name="nama" placeholder="Masukkan Nama Barang" autocomplete="off" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="harga_beli"><strong>Harga Beli</strong></label>
                                        <input type="number" name="harga_beli" placeholder="Masukkan Harga Beli" autocomplete="off" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="harga_jual"><strong>Harga Jual</strong></label>
                                        <input type="number" name="harga_jual" placeholder="Masukkan Harga Jual" autocomplete="off" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="stock"><strong>Stok</strong></label>
                                        <input type="number" name="stock" placeholder="Masukkan Stock" autocomplete="off" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="satuan"><strong>Satuan</strong></label>
                                        <select name="satuan" id="satuan" class="form-control" required>
                                            <option value="">-- Silahkan Pilih --</option>
                                            <option value="pcs">PCS</option>
                                            <option value="sachet">SACHET</option>
                                            <option value="renceng">RENCENG</option>
                                            <option value="pak">PAK</option>
                                            <option value="kg">KILOGRAM</option>
                                            <option value="ons">ONS</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>