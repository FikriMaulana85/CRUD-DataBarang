<div class="modal fade text-left" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="tambah_barang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tambah_barang">Tambah Data Barang</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded-0">
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- <form action="<?= base_url("master_barang/simpan_barang"); ?>" method="POST" enctype="multipart/form-data"> -->
                                    <form id="formbarang" enctype="multipart/form-data" data-parsley-validate>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama_barang">Nama Barang</label>
                                                    <input type="text" class="form-control <?php if (form_error('nama_barang')) echo 'is-invalid'; ?>" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                                                    <?= form_error('nama_barang', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="stok_barang">Stok Barang</label>
                                                    <input type="number" class="form-control <?php if (form_error('stok_barang')) echo 'is-invalid'; ?>" id="stok_barang" name="stok_barang" placeholder="Stok Barang" required>
                                                    <?= form_error('stok_barang', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="harga_beli">Harga Beli</label>
                                                    <input type="number" class="form-control <?php if (form_error('harga_beli')) echo 'is-invalid'; ?>" id="harga_beli" name="harga_beli" placeholder="Harga Beli" required>
                                                    <?= form_error('harga_beli', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="harga_jual">Harga Jual</label>
                                                    <input type="number" class="form-control <?php if (form_error('harga_jual')) echo 'is-invalid'; ?>" id="harga_jual" name="harga_jual" placeholder="Harga Jual" required>
                                                    <?= form_error('harga_jual', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="foto_barang">Foto Barang</label>
                                                    <input type="file" class="form-control <?php if (form_error('foto_barang')) echo 'is-invalid'; ?>" id="foto_barang" name="foto_barang" placeholder="Pilih Foto Barang" required>
                                                    <small>*Ukuran Foto Maksimal 100KB</small>
                                                    <?= form_error('foto_barang', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>