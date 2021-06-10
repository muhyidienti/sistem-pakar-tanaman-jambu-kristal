<body>
    <script>
        const base_url = '<?= base_url(); ?>'
    </script>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">

        <h5 class="mt-2"> <strong class=" mr-5 ml-3">Sistem Pakar</strong></h5>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-right" id="navbarNav">
            <ul class="navbar-nav">

                <?php if ($this->session->userdata('role_id') == 1) { ?>
                    <li class="nav-item active mt-2 timbul">
                        <a class="nav-link " href="<?= base_url('dashboard/index') ?>">Kelola Data</a>
                    </li>
                <?php  } ?>

                <li class="nav-item active  mt-2">
                    <a class="nav-link t" href="<?= base_url('diagnosa/index') ?>">Diagnosa Penyakit</a>
                </li>

                <div class="dropdown mt-3 ml-4">
                    <a href="" class="text-dark dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= base_url('profile/index') ?>">My Profile</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>