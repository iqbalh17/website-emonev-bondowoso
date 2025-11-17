<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<?= $this->include('admin/templates/navbar'); ?>

<!-- Jumbotron -->
<section class="jumbotron text-center">
    <img src="<?= base_url('/img/Lambang_Bondowoso.png'); ?>" alt="bingung gambarnya apa" class="">
    <h1 class="display-7 fw-bold">BAPPEDA KABUPATEN BONDOWOSO</h1>
    <p class="lead">WWC | Web Contact Control</p>
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h3 class="fw-bold">Program</h3>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-md-2 mb-3">
                <a href=""><button class="btn btn-primary btn-lg fw-bold">Evaluasi Renja</button></a>
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
                <a href=""><button class="btn btn-primary btn-lg fw-bold text-center ms-3" style="width: 180px;">Evaluasi Monev lapangan</button></a>
            </div>
        </div>
        <div class="row justify-content-center text-center mt-3">
            <div class="col-md-2 mb-3">
                <a href="<?= base_url('/admin/reset_sandi'); ?>"><button class="btn btn-primary btn-lg fw-bold" style="height: 80px;">Reset Sandi</button></a>
            </div>
            <div class="col-md-2 mb-3">
                <a href="<?= base_url('/admin/jadwal'); ?>"><button class="btn btn-primary btn-lg fw-bold text-center" style="height: 80px;">Buat Jadwal</button></a>
            </div>
        </div>
    </div>
</section>
<!-- Akhir jumbotron -->

<!-- projects -->
<!-- <section id="projects">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#e2edff" fill-opacity="1" d="M0,192L34.3,181.3C68.6,171,137,149,206,133.3C274.3,117,343,107,411,96C480,85,549,75,617,90.7C685.7,107,754,149,823,144C891.4,139,960,85,1029,106.7C1097.1,128,1166,224,1234,224C1302.9,224,1371,128,1406,80L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg> -->
</section>
<!-- akhir projects -->
<?= $this->endSection(); ?>