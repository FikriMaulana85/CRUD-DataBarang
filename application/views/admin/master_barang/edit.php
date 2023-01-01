<div class="modal fade text-left" id="edit_barang" tabindex="-1" role="dialog" aria-labelledby="edit_barang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Barang</h4>
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
                                    <form id="formedit" enctype="multipart/form-data" data-parsley-validate>
                                        <input type="hidden" name="id" id="id" required>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="edit_nama_barang">Nama Barang</label>
                                                    <input type="text" class="form-control <?php if (form_error('edit_nama_barang')) echo 'is-invalid'; ?>" id="edit_nama_barang" name="edit_nama_barang" placeholder="Nama Barang" required>
                                                    <?= form_error('edit_nama_barang', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="edit_stok_barang">Stok Barang</label>
                                                    <input type="number" class="form-control <?php if (form_error('edit_stok_barang')) echo 'is-invalid'; ?>" id="edit_stok_barang" name="edit_stok_barang" placeholder="Stok Barang" required>
                                                    <?= form_error('edit_stok_barang', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="edit_harga_beli">Harga Beli</label>
                                                    <input type="number" class="form-control <?php if (form_error('edit_harga_beli')) echo 'is-invalid'; ?>" id="edit_harga_beli" name="edit_harga_beli" placeholder="Harga Beli" required>
                                                    <?= form_error('edit_harga_beli', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="edit_harga_jual">Harga Jual</label>
                                                    <input type="number" class="form-control <?php if (form_error('edit_harga_jual')) echo 'is-invalid'; ?>" id="edit_harga_jual" name="edit_harga_jual" placeholder="Harga Jual" required>
                                                    <?= form_error('edit_harga_jual', '<div class="invalid-feedback">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="edit_foto_barang">Foto Barang</label>
                                                    <input type="hidden" name="edit_foto_barang_old" id="edit_foto_barang_old" required>
                                                    <input type="file" class="form-control <?php if (form_error('edit_foto_barang')) echo 'is-invalid'; ?>" id="edit_foto_barang" name="edit_foto_barang" placeholder="Pilih Foto Barang">
                                                    <small>*Ukuran Foto Maksimal 100KB</small>
                                                    <?= form_error('edit_foto_barang', '<div class="invalid-feedback">', '</div>'); ?>
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