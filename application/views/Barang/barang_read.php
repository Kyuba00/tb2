<!--link tambah data-->
<div class="float-right">
    <a href="<?= base_url('barang/data_export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
    <a href="<?= base_url('barang/insert') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
</div>
<br /><br />

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header"><strong>Daftar Barang</strong></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kategori Barang</td>
                                    <td>Nama Barang</td>
                                    <td>Harga Beli</td>
                                    <td>Harga Jual</td>
                                    <td>Stok</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_barang as $barang) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $barang['nama_kategori_barang']; ?></td>
                                        <td><?php echo $barang['nama']; ?></td>
                                        <td>Rp <?= number_format($barang['harga_beli']) ?></td>
                                        <td>Rp <?= number_format($barang['harga_jual']) ?></td>
                                        <td><?= number_format($barang['stock']) ?></td>
                                        <td>
                                            <a href="<?= base_url('barang/update/' . $barang['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                            <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('barang/delete/' . $barang['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>