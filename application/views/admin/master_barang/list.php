<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang | Fikri</title>
    <!-- Main CSS -->
    <?php $this->load->view("layout/css"); ?>
    <!-- Close Main CSS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <?php $this->load->view("layout/sidebar"); ?>
        <!-- Close Sidebar -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="container col-12 col-md-6 offset-md-3">
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title">List Data Barang</h6>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-md btn-success btn-icon-split" id="riwayat" data-bs-toggle="modal" data-bs-target="#tambah_barang">
                                        <span class="icon">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Barang</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive" id="tabelbarang">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                </section>
            </div>

            <!-- Footer -->
            <?php $this->load->view("layout/footer"); ?>
            <!-- Close Footer -->
        </div>
    </div>
    <?php $this->load->view("admin/master_barang/add"); ?>
    <?php $this->load->view("admin/master_barang/edit"); ?>
    <?php $this->load->view("admin/master_barang/detail"); ?>
    <!-- Main JS -->
    <?php $this->load->view("layout/js"); ?>
    <!-- Close Main JS -->

    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/extensions/parsleyjs/parsley.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/parsley.js"></script>
    <script src="//cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script>
        const domain = '<?= base_url(); ?>'
    </script>
</body>

</html>