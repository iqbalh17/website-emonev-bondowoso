<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<!-- Jumbotron -->
<section class="tahun">
    <div class="container">
        <div class="row text-center ">
            <div class="col ">
                <h1 class="fw-bold fs-1">Pilih Tahun</h1>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffff" fill-opacity="1" d="M0,192L34.3,186.7C68.6,181,137,171,206,154.7C274.3,139,343,117,411,106.7C480,96,549,96,617,96C685.7,96,754,96,823,117.3C891.4,139,960,181,1029,186.7C1097.1,192,1166,160,1234,144C1302.9,128,1371,128,1406,128L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686
            ,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320
            ,69,320,34,320L0,320Z"></path>
    </svg>
</section>
<!-- Akhir jumbotron -->

<!-- about -->
<!-- <section id="about">
           <div class="container">
               <div class="row text-center mb-3">
                   <div class="col">
                       <h2 class="fw-bold">About me</h2>
                   </div>
               </div>
               <div class="row justify-content-center fs-5 text-center">
                   <div class="col-4">
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi quasi aliquam quibusdam ratione, vel qui aspernatur doloremque eum. Nisi, officia?</div>
                   <div class="col-4">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore maiores nostrum ut. Architecto ut culpa, possimus sequi deleniti porro, accusamus dolore doloribus consectetur suscipit odit.
                   </div>
               </div>
           </div>
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,160L288,128L576,224L864,96L1152,192L1440,256L1440,320L1152,320L864,320L576,320L288,320L0,320Z"></path></svg>
       </section> -->
<!-- Akhir About -->

<!-- projects -->
<section id="projects">
    <div class="container">
        <div class="row justify-content-center text-center" style="padding-top: -4rem;">
            <div class="col-md-2 mb-3">
                <a class="btn btn-primary fw-bold fs-4 rounded-circle" href="<?= base_url('/tahun/2021'); ?>"><i class="fas fa-calendar-alt fa-2x mt-2"></i></a>
                <h4 class="mt-1 fw-bold">2021</h4>
            </div>

            <!-- <div class="col-md-2 mb-3">
                    <a href=""><button class="btn btn-primary btn-lg fw-bold" >Evaluasi TP/Dekon</button></a>
                   </div>
                   <div class="col-md-2 mb-3">
                    <a href=""><button class="btn btn-primary btn-lg fw-bold text-center ms-3" style="width: 180px;">Evaluasi Monev lapangan</button></a>
                   </div> -->
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#e2edff" fill-opacity="1" d="M0,192L34.3,181.3C68.6,171,137,149,206,133.3C274.3,117,343,107,411,96C480,85,549,75,617,90.7C685.7,107,754,149,823,144C891.4,139,960,85,1029,106.7C1097.1,128,1166,224,1234,224C1302.9,224,1371,128,1406,80L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>
</section>
<!-- akhir projects -->

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-cek="<?= (session()->get('sistem')) ? 'true' : 'false'; ?>">
        <div class="toast-header">
            <strong class="me-auto"><i class="fas fa-cog me-1"></i>Sistem</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= session()->get('sistem'); ?><i class="fas fa-check ms-1" style="color: #20c997;"></i>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>