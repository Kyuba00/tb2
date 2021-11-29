<!--link tambah data-->
<a href="<?php echo site_url('kategori_barang/insert'); ?>" class="btn btn-primary">
    <i class="fa fa-plus"> Tambah</i>
</a>
<a href="<?php echo site_url('fakultas/data_export'); ?>" class="btn btn-outline-info" style="float: right;">
    <i class="fa fa-download"> Export Excel</i>
</a>
<br /><br />

<table class="table table-striped table-hover" id="datatables">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data_kategori_barang as $kategori_barang) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $kategori_barang['nama']; ?></td>
                <td>
                    <a href="<?php echo site_url('kategori_barang/update/' . $kategori_barang['id']); ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Ubah
                    </a>

                    <a href="<?php echo site_url('kategori_barang/delete/' . $kategori_barang['id']); ?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>