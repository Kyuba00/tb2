<div class="float-right">
    <a href="<?php echo site_url('penjualan/data_export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
    <a href="<?php echo site_url('penjualan/insert') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                                    <th>No</th>
                                    <th>Tanggal Jual</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_penjualan as $penjualan) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $penjualan['tanggal_jual']; ?></td>
                                        <td><?php echo $penjualan['total']; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('penjualan_barang/read/' . $penjualan['id']); ?>" class="btn btn-primary">
                                                <i class="fas fa-book"></i> Barang
                                            </a>

                                            <a href="<?php echo site_url('penjualan/update/' . $penjualan['id']); ?>" class="btn btn-warning">
                                                <i class="fas fa-edit"></i> Ubah
                                            </a>

                                            <a href="<?php echo site_url('penjualan/delete/' . $penjualan['id']); ?>" onClick="return confirm('Anda yakin?')" class="btn btn-danger">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>