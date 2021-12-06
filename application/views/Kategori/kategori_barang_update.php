<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong>Tambah Barang</strong>
                        </div>
                        <div class="card-body">
                            <!--$data_kategori_barang_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
                            <form method="post" action="<?php echo site_url('kategori_barang/update_submit/' . $data_kategori_barang_single['id']); ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama">
                                                    <strong>Nama Kategori</strong>
                                                </label>
                                                <input type="text" name="nama" value="<?php echo $data_kategori_barang_single['nama']; ?>" class="form-control" required="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>