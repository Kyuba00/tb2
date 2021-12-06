<!--link tambah data-->
<div class="float-right">
    <a href="<?php echo site_url('kategori_barang/data_export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
    <a href="<?php echo site_url('kategori_barang/insert') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                                            <a href="<?php echo site_url('kategori_barang/update/' . $kategori_barang['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                            <a onclick="return confirm('apakah anda yakin?')" href="<?php echo site_url('kategori_barang/delete/' . $kategori_barang['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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