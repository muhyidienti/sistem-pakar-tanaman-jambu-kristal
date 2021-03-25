<body>
    <script>
        const base_url = '<?= base_url(); ?>'
    </script>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/images_upload/logo/') ?>logo.png" class="ml-4" width="90" height="90">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-right" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item active mt-2">
                    <a class="nav-link" href="<?= base_url('dashboard/index') ?>">Kelola Data</a>
                </li>
                <li class="nav-item active  mt-2">
                    <a class="nav-link t" href="<?= base_url('transaksi/tampil_makanan') ?>">Diagnosa Penyakit</a>
                </li>
            </ul>
        </div>
    </nav>