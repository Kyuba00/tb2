<!--link tambah data-->
<a href="<?php echo site_url('barang/insert'); ?>" class="btn btn-primary">
    <i class="fa fa-plus"> Tambah</i>
</a>
<a href="<?php echo site_url('barang/data_export'); ?>" class="btn btn-outline-info" style="float: right;">
    <i class="fas fa-download">Export Excel</i>
</a>
<br /><br />

<table class="table table-responsive-sm" id="datatables">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data_barang as $barang) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $barang['nama_kategori_barang']; ?></td>
                <td><?php echo $barang['nama']; ?></td>
                <td><?php echo number_format($barang['harga']); ?></td>
                <td><?php echo $barang['stock']; ?></td>
                <td>
                    <a href="<?php echo site_url('barang/update/' . $barang['id']); ?>" class="btn btn-secondary">
                        Ubah
                    </a>

                    <a href="<?php echo site_url('barang/delete/' . $barang['id']); ?>" class="btn btn-danger">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>