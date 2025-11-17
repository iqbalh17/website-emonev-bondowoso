<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<section class="mantap" style=" background-color: #e2edff;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <img src="<?= base_url('/img/Lambang_Bondowoso.png'); ?>" alt="bingung gambarnya apa" class="mt-3">
                <h1 class="display-6 fw-bold">BAPPEDA KABUPATEN BONDOWOSO</h1>
                <p class="lead">Bappeda | Bondowoso</p>
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="row">
            <h1 class="alert bg-primary text-light text-center mt-3">Ubah Sandi</h1>
            <?php if (session()->get('berhasil')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->get('berhasil'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('/home/editSandi'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group mt-2" style="font-family: 'Yusei Magic', sans-serif;">
                    <label for="pd">Password</label>
                    <input type="password" name="passlama" class="form-control passlama pd <?= (session()->get('pesan')) ? 'is-invalid' : ""; ?>" placeholder="password" id="passlama">
                    <div id="passlamaFeedback" class="invalid-feedback"><?= session()->get('pesan'); ?></div>
                    <div class="form-group custom-control custom-checkbox" style="font-family: 'Yusei Magic', sans-serif;">
                        <input type="checkbox" class="custom-control-input show" id="show1">
                        <label class="custom-control-label" for="show1">Show character</label>
                    </div>
                </div>
                <div class="form-group mt-2" style="font-family: 'Yusei Magic', sans-serif;">
                    <label for="pd">Password Baru</label>
                    <input type="password" name="passbaru" class="form-control passbaru pd <?= ($validation->hasError('passbaru') || session()->get('pesanPassBaru')) ? 'is-invalid' : ""; ?>" placeholder="password" id="passbaru" value="<?= old("passbaru"); ?>">
                    <div id="passbaruFeedback" class="invalid-feedback"><?= $validation->getError('passbaru'); ?><?= session()->get('pesanPassBaru'); ?></div>
                    <div class="form-group custom-control custom-checkbox" style="font-family: 'Yusei Magic', sans-serif;">
                        <input type="checkbox" class="custom-control-input show" id="show2">
                        <label class="custom-control-label" for="show2">Show character</label>
                    </div>
                </div>
                <div class="form-group mt-2" style="font-family: 'Yusei Magic', sans-serif;">
                    <label for="pd">Konfirmasi Password Baru</label>
                    <input type="password" name="passcon" class="form-control passcon pd <?= ($validation->hasError('passcon')) ? 'is-invalid' : ""; ?>" placeholder="password" value="<?= old("passcon"); ?>">
                    <div id="passconFeedback" class="invalid-feedback"><?= $validation->getError('passbaru'); ?></div>
                    <div class="form-group custom-control custom-checkbox" style="font-family: 'Yusei Magic', sans-serif;">
                        <input type="checkbox" class="custom-control-input show" id="show3">
                        <label class="custom-control-label" for="show3">Show character</label>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn fw-bold submit" disabled>Ubah</button>
                    </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>