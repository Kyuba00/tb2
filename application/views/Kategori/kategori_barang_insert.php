<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong>Tambah Kategori Barang</strong>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo site_url('kategori_barang/insert_submit/'); ?>">
                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="nama"><strong>Nama Kategori</strong></label>
                                                <input type="text" name="nama" value="" class="form-control" required="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Batal</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>