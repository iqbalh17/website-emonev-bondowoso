<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>



<section class="mantap">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-6 text-center mt-5">
                <h2 class="display-7 fw-bold">Pengendalian Renja OPD Dengan WCC</h2>
            </div>
            <div class="col-2 mt-1">
                <img src="<?= base_url('/img/Lambang_Bondowoso.png'); ?>" alt="bingung gambarnya apa" class="mt-3">
            </div>

            <div class="row mt-4 mb-3 text-center">
                <p class="lead fs-6 fw-bold"><span class="bg-warning"><strong> WCC | Web Context Control</strong></span></p>
            </div>
        </div>

    </div>
    <div class="container mx-auto">
        <div class="row">
            <h4 class="alert bg-primary text-light text-center mt-3">BAPPEDA KAB BONDOWOSO</h4>
            <form action="<?= base_url('/admin/masuk'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group" style="font-family: 'Yusei Magic', sans-serif;">
                    <label for="nama">Username</label>
                    <input type="text" value="admin" readonly name="username" class="form-control bg-light">
                </div>

                <div class="form-group mt-2" style="font-family: 'Yusei Magic', sans-serif;">
                    <label for="pd">Password</label>
                    <input type="password" name="password" id="pd" class="form-control <?= session()->get('pesan') ? "is-invalid" : ""; ?>" placeholder="password">
                    <div id="pdFeedback" class="invalid-feedback">
                        <?= session()->get('pesan'); ?>
                    </div>
                    <div class="form-group custom-control custom-checkbox" style="font-family: 'Yusei Magic', sans-serif;">
                        <input type="checkbox" class="custom-control-input" id="show">
                        <label class="custom-control-label" for="show">Show character</label>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-10">
                            <button type="submit" class="btn" id="tombol">Login<i class="fas fa-sign-in-alt ms-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>