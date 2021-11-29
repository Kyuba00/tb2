<form method="post" action="<?php echo site_url('barang/update_submit/' . $data_barang_single['id']); ?>" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori_barang_id" class="form-control">
                    <?php foreach ($data_kategori_barang as $kategori_barang) : ?>

                        <?php if ($kategori_barang['id'] == $data_barang_single['kategori_barang_id']) : ?>
                            <option value="<?php echo $kategori_barang['id']; ?>" selected>
                                <?php echo $kategori_barang['nama']; ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $kategori_barang['id']; ?>">
                                <?php echo $kategori_barang['nama']; ?>
                            </option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama" value="<?php echo $data_barang_single['nama']; ?>" class="form-control" required=""></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" value="<?php echo $data_barang_single['harga']; ?>" class="form-control" required=""></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" name="stock" value="<?php echo $data_barang_single['stock']; ?>" class="form-control" required=""></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
        </tr>
    </table>
</form>