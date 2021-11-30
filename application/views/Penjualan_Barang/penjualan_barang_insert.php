<h1><?php echo $judul ?></h1>


<form method="post" action="<?php echo site_url('penjualan_barang/insert_submit/'); ?>">
    <table class="table table-borderless table-responsive">
        <tr>
            <td>penjualan</td>
            <!--$data_penjualan_barang_single['tanggal_jual'] : menampilkan data penjualan_barang yang dipilih dari database -->
            <td>
                <select name="penjualan_id" class="custom-select">
                    <?php foreach ($data_penjualan as $penjualan) : ?>
                        <option value="<?php echo $penjualan['id']; ?>">
                            <?php echo $penjualan['tanggal_jual']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>nama</td>
            <!--$data_penjualan_barang_single['nama'] : menampilkan data penjualan_barang yang dipilih dari database -->
            <td>
                <select name="barang_id" class="custom-select">
                    <?php foreach ($data_barang as $barang) : ?>
                        <option value="<?php echo $barang['id']; ?>">
                            <?php echo $barang['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
        </tr>
    </table>
</form>