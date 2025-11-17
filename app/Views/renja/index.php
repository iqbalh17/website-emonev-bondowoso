<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<section class="renja">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <h1 class="display-5 fw-bold">Evaluasi Renja</h1>
            </div>
            <div class="col-md-1">
                <a href="<?= base_url('/home'); ?>"><i class="fas fa-hand-point-left fa-3x" data-bs-toggle="tooltip" data-placement="top" title="Kembali"></i></a>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffff" fill-opacity="1" d="M0,192L34.3,186.7C68.6,181,137,171,206,154.7C274.3,139,343,117,411,106.7C480,96,549,96,617,96C685.7,96,754,96,823,117.3C891.4,139,960,181,1029,186.7C1097.1,192,1166,160,1234,144C1302.9,128,1371,128,1406,128L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>
</section>


<section id="about">
    <div class="container">
        <div class="row mb-3 justify-content-between">
            <div class="col-md-5">
                <?php if (session()->get('berhasil')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->get('berhasil'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-5 <?= (waktuAktif()) ? '' : 'd-flex justify-content-around'; ?>">
                <a href="FORMAT REKAP COVID_Kab Bondowoso.xlsx"><button class="btn-primary btn-lg mb-3"><i class="fas fa-download me-1"></i>Download Awal</button></a>
                <?php if (waktuAktif()) : ?>
                    <button class="btn-success btn-lg tambah" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle me-1"></i>Tambah Data</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Jenis Dokumen</th>
                            <th scope="col">Nama OPD</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($daftar == null) : ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data terbaru</td>
                            </tr>
                        <?php else : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($daftar as $d) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $d['jenis']; ?></td>
                                    <td><?= namaOPD(); ?></td>
                                    <td>
                                        <?php $triwulan = explode(' ', $d['jenis']);
                                        $triwulan = end($triwulan); ?>
                                        <a href="<?= base_url('/evaluasi_renja/download/' . $d['id']); ?>"><button class="btn-primary btn-sm buttonDownload" data-id="<?= $d['id']; ?>"><i class="fas fa-download"></i></button></a>
                                        <?php if (waktuAktif() && cekTriwulan($triwulan)) : ?>
                                            <button type="button" class="btn-danger btn-sm delete" data-bs-toggle="modal" data-bs-target="#popupdelete" data-id="<?= $d['id']; ?>"><i class="fas fa-trash"></i></button>
                                            <button class="btn-warning btn-sm edit" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $d['id']; ?>" data-jenis="<?= $d['jenis']; ?>"><i class=" fas fa-edit" style="color: white;"></i></button>
                                        <?php endif; ?>
                                        <?php if (isAdmin(getRole())) : ?>
                                            <a href="<?= base_url('/evaluasi_renja/downloadTTD/' . $d['id']); ?>"><button class="btn-success btn-sm"><i class="fas fa-download"> TTD</i></button></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#e2edff" fill-opacity="1" d="M0,192L34.3,181.3C68.6,171,137,149,206,133.3C274.3,117,343,107,411,96C480,85,549,75,617,90.7C685.7,107,754,149,823,144C891.4,139,960,85,1029,106.7C1097.1,128,1166,224,1234,224C1302.9,224,1371,128,1406,80L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>
</section>

<div class="modal fade" data-cek="<?= (session()->get('cek')) ? 'show' : 'hide'; ?>" data-edit="<?= (session()->get('edit')) ? "edit" : "tambah"; ?>" data-id="<?= (session()->get('idedit')) ? session()->get('idedit') : ''; ?>" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="loader">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('/evaluasi_renja/tambah'); ?>" method="post" id="form1" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Jenis dokumen :</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control bg-light" id="jenis" value="Evaluasi Renja Triwulan <?= getJadwal(); ?>" name="jenis">
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group mb-3">
                            <label for="" class="col-sm-3 col-form-label">Upload dokumen :</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control <?= ($validation->hasError('dokumen')) ? 'is-invalid' : ''; ?>" id="dokumen" name="dokumen" required onchange="cek('dokumen')">
                                <div id="dokumenFeedback" class="invalid-feedback">
                                    <?= $validation->getError('dokumen'); ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 ms-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="validasi">
                            <label class="form-check-label" for="validasi">
                                Validasi Pengguna Anggaran (PA)
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Nama PA :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="namaPA" name="namaPA" placeholder="Masukkan Nama PA" value="<?= old('namaPA'); ?>" autocomplete="off">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">NIP PA :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control <?= ($validation->hasError('NIP'))  ? 'is-invalid' : ''; ?>" id="NIP" name="NIP" placeholder="Masukkan NIP PA" value="<?= old('NIP'); ?>" autocomplete="off" required>
                            <div id="NIPFeedback" class="invalid-feedback">
                                <?= $validation->getError('NIP'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group mb-3">
                            <label for="" class="col-sm-3 col-form-label">Upload TTD PA :</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control <?= ($validation->hasError('ttd')) ? 'is-invalid' : ''; ?>" id="ttd" name="ttd" required onchange="cek('ttd')">
                                <div id="ttdFeedback" class="invalid-feedback">
                                    <?= $validation->getError('ttd'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form1" id="submit">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popupdelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                yakin?
                <form action="" method="post" class="d-inline" id="delete">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary" form="delete">Hapus</button>
            </div>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-check="<?= (session()->get('timeout')) ? 'true' : 'false'; ?>">
        <div class="toast-header">
            <strong class="me-auto"><i class="fas fa-cog me-1"></i>Sistem</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= session()->get('timeout'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>