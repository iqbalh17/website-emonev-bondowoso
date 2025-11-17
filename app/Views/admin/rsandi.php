<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<?= $this->include('admin/templates/navbar'); ?>

<section class="renja">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <h1 class="display-5 fw-bold">Reset Sandi</h1>
            </div>
            <div class="col-md-1">
                <a href="<?= base_url('/admin/home'); ?>"><i data-bs-toggle="tooltip" data-placement="top" title="Kembali" class="fas fa-hand-point-left fa-3x"></i></a>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffff" fill-opacity="1" d="M0,192L34.3,186.7C68.6,181,137,171,206,154.7C274.3,139,343,117,411,106.7C480,96,549,96,617,96C685.7,96,754,96,823,117.3C891.4,139,960,181,1029,186.7C1097.1,192,1166,160,1234,144C1302.9,128,1371,128,1406,128L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>
</section>


<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if (session()->get('berhasil')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->get('berhasil'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-5">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Nama OPD..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" id="keyword" style="border: 1.5px solid #70cbff;" autofocus>
                    </div>
                </form>
            </div>
            <div class="col-md-1 d-flex justify-content-start">
                <div class="spinner-border ms-1 mt-1 text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Nama OPD</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php $i = 1 ?>
                        <?php foreach ($nama as $n) :  ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $n['nama']; ?></td>
                                <td>
                                    <button class="btn-danger btn-sm resetbutton" data-bs-toggle="modal" data-bs-target="#resetpopup" data-id="<?= $n['id']; ?>"><i class="fas fa-sync-alt"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#e2edff" fill-opacity="1" d="M0,192L34.3,181.3C68.6,171,137,149,206,133.3C274.3,117,343,107,411,96C480,85,549,75,617,90.7C685.7,107,754,149,823,144C891.4,139,960,85,1029,106.7C1097.1,128,1166,224,1234,224C1302.9,224,1371,128,1406,80L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>
</section>

<div class="modal fade" id="resetpopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset sandi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin?
                <form action="" method="post" class="d-inline" id="reset">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary" form="reset">Reset</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>