<form method="post" action="<?php echo site_url('barang/insert_submit/'); ?>" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori_barang_id" class="form-control">
                    <?php foreach ($data_kategori_barang as $kategori) : ?>
                        <option value="<?php echo $kategori['id']; ?>">
                            <?php echo $kategori['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama" value="" class="form-control" required=""></td>
        </tr>
        <tr>
            <td>Harga Barang</td>
            <td><input type="number" name="harga" value="" class="form-control" required=""></td>
        </tr>
        <tr>
            <td>Stok Barang</td>
            <td><input type="number" name="stock" value="" class="form-control" required=""></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
        </tr>
    </table>
</form>