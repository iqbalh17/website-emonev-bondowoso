<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<!-- Jumbotron -->
<section class="jumbotron text-center" id="jumbotron">
    <img src="<?= base_url(); ?>/img/Lambang_Bondowoso.png" alt="bingung gambarnya apa" class="">
    <h1 class="display-5 fw-bold">BAPPEDA KABUPATEN BONDOWOSO</h1>
    <p class="lead fs-4"><strong>WCC</strong> | <strong>W</strong>eb <strong>C</strong>ontact <strong>C</strong>ontrol</p>
    <div class="container">
        <div class="row text-center mb-3 mt-5">
            <div class="col">
                <h3 class="fw-bold">Program</h3>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-md-2 mb-3">
                <a href="<?= base_url('/evaluasi_renja'); ?>"><button class="btn btn-primary btn-lg fw-bold">Evaluasi Renja</button></a>
            </div>
            <div class="col-md-2 mb-3">
                <a href=""><button class="btn btn-primary btn-lg fw-bold" style="height: 80px;">Evaluasi DAK</button></a>
            </div>
            <div class="col-md-2 mb-3">
                <a href=""><button class="btn btn-primary btn-lg fw-bold" style="height: 80px;">Evaluasi BK</button></a>
            </div>
            <div class="col-md-2 mb-3">
                <a href=""><button class="btn btn-primary btn-lg fw-bold">Evaluasi TP/Dekon</button></a>
            </div>
            <div class="col-md-2 mb-3">
                <a href="<?= base_url('/evaluasi_monev_lapangan'); ?>"><button class="btn btn-primary btn-lg fw-bold text-center ms-3" style="width: 180px;">Evaluasi Monev lapangan</button></a>
            </div>
        </div>
    </div>
</section>
<!-- Akhir jumbotron -->

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-cek="<?= (session()->get('sistem')) ? 'true' : 'false'; ?>">
        <div class="toast-header">
            <strong class="me-auto"><i class="fas fa-cog me-1"></i>Sistem</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= session()->get('sistem'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>