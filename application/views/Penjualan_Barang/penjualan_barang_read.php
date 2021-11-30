<a href="<?php echo site_url('penjualan_barang/insert'); ?>" class="btn btn-primary">
    <i class="fa fa-plus"> Tambah</i>
</a>
<a href="<?php echo site_url('fakultas/data_export'); ?>" class="btn btn-outline-info" style="float:right">
    <i class="fa fa-download"> Export Excel</i>
</a>
<br /><br />

<table class="table table-responsive-sm" id="datatables">
    <thead class="thead-dark">
        <tr>
            <th>Tanggal jual</th>
            <th>Barang</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_penjualan_barang as $penjualan_barang) : ?>
            <tr>
                <td><?php echo $penjualan_barang['tanggal_jual']; ?></td>
                <td><?php echo $penjualan_barang['nama_barang']; ?></td>
                <td>
                    <a href="<?php echo site_url('penjualan_barang/update/' . $penjualan_barang['penjualan_id']); ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"> Ubah</i>
                    </a>

                    <a href="<?php echo site_url('penjualan_barang/delete/' . $penjualan_barang['penjualan_id']); ?>" class="btn btn-danger">
                        <i class="fa fa-trash-alt"> Hapus</i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>