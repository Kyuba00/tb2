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
                            <form action="<?php echo site_url('barang/update_submit/' . $data_barang_single['id']); ?>" enctype="multipart/form-data" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kategori_barang">
                                            <strong>Kategori Barang</strong>
                                        </label>
                                        <select name="kategori_barang_id" class="form-control" style="max-width: 20rem;">
                                            <?php foreach ($data_kategori_barang as $kategori) : ?>
                                                <?php if ($kategori['id'] == $data_barang_single['kategori_barang_id']) : ?>
                                                    <option value="<?php echo $kategori['id']; ?>" selected>
                                                        <?php echo $kategori['nama']; ?>
                                                    </option>
                                                <?php else : ?>
                                                    <option value="<?php echo $kategori['id']; ?>">
                                                        <?php echo $kategori['nama']; ?>
                                                    </option>
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama"><strong>Nama Barang</strong></label>
                                        <input type="text" name="nama" placeholder="Masukkan Nama Barang" autocomplete="off" class="form-control" required value="<?php echo $data_barang_single['nama']; ?>" style="max-width: 20rem;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="harga_beli">
                                            <strong>Harga Beli</strong>
                                        </label>
                                        <input type="number" name="harga_beli" placeholder="Masukkan Harga Beli" autocomplete="off" class="form-control" required value="<?php echo $data_barang_single['harga_beli']; ?>" style="max-width: 20rem;">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="harga_jual">
                                            <strong>Harga Jual</strong>
                                        </label>
                                        <input type="number" name="harga_jual" placeholder="Masukkan Harga jual" autocomplete="off" class="form-control" required value="<?php echo $data_barang_single['harga_jual']; ?>" style="max-width: 20rem;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="stock">
                                            <strong>Stock</strong>
                                        </label>
                                        <input type="number" name="stock" placeholder="Masukkan Stock Barang" autocomplete="off" class="form-control" required value="<?php echo $data_barang_single['stock']; ?>" style="max-width: 20rem;">
                                    </div>
                                    <div class=" form-group col-md-6">
                                        <label for="satuan"><strong>Satuan</strong></label>
                                        <select name="satuan" id="satuan" class="form-control" required style="max-width: 20rem;">
                                            <option value="">-- Silahkan Pilih --</option>
                                            <option value="pcs" <?php echo $data_barang_single['satuan'];
                                                                'pcs' ? 'selected' : '' ?>>PCS</option>
                                            <option value="sachet" <?php echo $data_barang_single['satuan'];
                                                                    'sachet' ? 'selected' : '' ?>>SACHET</option>
                                            <option value="renceng" <?php echo $data_barang_single['satuan'];
                                                                    'renceng' ? 'selected' : '' ?>>RENCENG</option>
                                            <option value="pak" <?php echo $data_barang_single['satuan'];
                                                                'pak' ? 'selected' : '' ?>>PAK</option>
                                            <option value="kg" <?php echo $data_barang_single['satuan'];
                                                                'kg' ? 'selected' : '' ?>>KILOGRAM</option>
                                            <option value="ons" <?php echo $data_barang_single['satuan'];
                                                                'ons' ? 'selected' : '' ?>>ONS</option>
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