<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-2" href="<?= base_url('/admin/home'); ?>">BAPPEDA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active fs-3 disabled" aria-current="page" href="#" aria-disabled="true">Admin</a>
                </li>
                <li class="nav-item dropdown me-4 ms-1 mt-1">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-cog fs-3"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('/admin/logout'); ?>"><i class="fas fa-power-off me-1" style="color: rgb(221, 52, 52);"></i>Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir navbar -->