<form method="post" action="<?php echo site_url('penjualan/insert_submit/'); ?>">
    <table class="table table-striped">
        <tr>
            <td>Barang</td>
            <td>
                <select name="id" class="form-control">
                    <?php foreach ($data_barang as $barang) : ?>
                        <option value="<?php echo $barang['id']; ?>">
                            <?php echo $barang['id']; ?> - <?php echo $barang['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tanggal Jual</td>
            <td><input type="date" name="tanggal_jual" value="<?php echo date('Y-m-d'); ?>" class="form-control" required=""></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
        </tr>
    </table>
</form>