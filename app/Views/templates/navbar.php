<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-2" href="<?= base_url('/home'); ?>">BAPPEDA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item text-end">
                    <div class="nav-link fw-bold disabled active <?= cekStringLen(strlen(namaOPD())); ?>" aria-current="page" aria-disabled="true"><?= namaOPD(); ?></div>
                </li>
                <li class="nav-item dropdown me-4 ms-1 mt-2">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-cog fs-3"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (!isset($nousandi)) : ?>
                            <li><a class="dropdown-item" href="<?= base_url('/sandi/ubah'); ?>"><i class="fas fa-key me-1" style="color: rgb(243, 228, 19);"></i>Ubah sandi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="<?= base_url('/logout'); ?>"><i class="fas fa-power-off me-1" style="color: rgb(221, 52, 52);"></i>Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php if (isset($timer) && waktuAktif()) : ?>
    <?php $waktuAkhir = getAkhir(); ?>
    <div class="timer" data-waktu="<?= $waktuAkhir; ?>">
        <div><span>hari</span><span class="days">00</span></div>
        <div><span></span><span>:</span></div>
        <div><span>jam</span><span class="hours">00</span></div>
        <div><span> </span><span>:</span></div>
        <div><span>menit</span><span class="minutes">00</span></div>
    </div>
<?php endif; ?>