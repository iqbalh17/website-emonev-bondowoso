<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<section class="renja">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <h1 class="display-5 fw-bold">Evaluasi Monev Lapangan</h1>
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
            <div class="col-md-3 mb-3">
                <button class="btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="fas fa-plus-circle me-1"></i>Tambah Data</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Pekerjaan</th>
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
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $d['pekerjaan']; ?></td>
                                    <td><?= namaOPD(); ?></td>
                                    <td>
                                        <a href="<?= base_url('/evaluasi_monev_lapangan/exportPdf/' . $d['id']); ?>" target="_blank"><button class="btn-primary btn-sm"><i class="fas fa-download"></i></button></a>
                                        <button class="btn-danger btn-sm delete" type="button" data-bs-toggle="modal" data-bs-target="#popupdelete" data-id="<?= $d['id']; ?>"><i class="fas fa-trash"></i></button>
                                        <button class="btn-warning btn-sm edit" data-id="<?= $d['id']; ?>" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit" style="color: white;"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- modal -->

<div class="modal fade" id="tambahModal" data-check="<?= (session()->get('cek')) ? 'true' : 'false'; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/evaluasi_monev_lapangan/tambah'); ?>" id="tambahForm" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Program :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('program')) ? 'is-invalid' : ''; ?>" id="program" name="program" required autocomplete="off" value="<?= old('program'); ?>" placeholder="Masukkan Program">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Kegiatan :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('kegiatan')) ? 'is-invalid' : ''; ?>" id="kegiatan" name="kegiatan" required autocomplete="off" value="<?= old('kegiatan'); ?>" placeholder="Masukkan Kegiatan">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Sub Kegiatan :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('subkegiatan')) ? 'is-invalid' : ''; ?>" id="subkegiatan" name="subkegiatan" required autocomplete="off" value="<?= old('subkegiatan'); ?>" placeholder="Masukkan Sub Kegiatan">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Pekerjaan :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= (session()->get('errorPekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" required autocomplete="off" value="<?= old('pekerjaan'); ?>" placeholder="Masukkan Pekerjaan">
                                <div id="pekerjaanFeedback" class="invalid-feedback">
                                    <?= session()->get('errorPekerjaan'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Anggaran :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control rupiah <?= ($validation->hasError('anggaran')) ? 'is-invalid' : ''; ?>" id="anggaran" name="anggaran" required autocomplete="off" value="<?= old('anggaran'); ?>" placeholder="Masukkan Anggaran (angka)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Alamat Lokasi :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" required autocomplete="off" value="<?= old('alamat'); ?>" placeholder="Masukkan Alamat Lokasi">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Nomor Kontrak :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nomorkontrak')) ? 'is-invalid' : ''; ?>" id="nomorkontrak" name="nomorkontrak" required autocomplete="off" value="<?= old('nomorkontrak'); ?>" placeholder="Masukkan Nomor Kontrak">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Nilai Kontrak :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control rupiah <?= ($validation->hasError('nilaikontrak')) ? 'is-invalid' : ''; ?>" id="nilaikontrak" name="nilaikontrak" required autocomplete="off" value="<?= old('nilaikontrak'); ?>" placeholder="Masukkan Nilai Kontrak (angka)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Pelaksana :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pelaksana')) ? 'is-invalid' : ''; ?>" id="pelaksana" name="pelaksana" required autocomplete="off" value="<?= old('pelaksana'); ?>" placeholder="Masukkan Pelaksana">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered border-secondary mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Uraian</th>
                                            <th scope="col">Triwulan I</th>
                                            <th scope="col">Triwulan II</th>
                                            <th scope="col">Triwulan III</th>
                                            <th scope="col">Triwulan IV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Perkembangan Fisik (%)</th>
                                            <td><input type="text" id="PerFisI" value="<?= old('PerFisI'); ?>" class="persen" name="PerFisI" placeholder="Masukkan"></td>
                                            <td><input type="text" id="PerFisII" value="<?= old('PerFisII'); ?>" class="persen" name="PerFisII" placeholder="Masukkan"></td>
                                            <td><input type="text" id="PerFisIII" value="<?= old('PerFisIII'); ?>" class="persen" name="PerFisIII" placeholder="Masukkan"></td>
                                            <td><input type="text" id="PerFisIV" value="<?= old('PerFisIV'); ?>" class="persen" name="PerFisIV" placeholder="Masukkan"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Realisasi Keuangan (Rp)</th>
                                            <td><input type="text" placeholder="Masukkan" id="realKeuI" value="<?= old('realKeuI'); ?>" class="rupiah" name="realKeuI"></td>
                                            <td><input type="text" placeholder="Masukkan" id="realKeuII" value="<?= old('realKeuII'); ?>" class="rupiah" name="realKeuII"></td>
                                            <td><input type="text" placeholder="Masukkan" id="realKeuIII" value="<?= old('realKeuIII'); ?>" class="rupiah" name="realKeuIII"></td>
                                            <td><input type="text" placeholder="Masukkan" id="realKeuIV" value="<?= old('realKeuIV'); ?>" class="rupiah" name="realKeuIV"></td>
                                        </tr>
                                        <tr>
                                            <input type="text" hidden id="totalInput" name="total">
                                            <th scope="row">Jumlah Total (Rp)</th>
                                            <td colspan="4" id="total">Rp 0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="formFile" class="form-label">Triwulan I</label>
                            <div class="col col-md-8 ">
                                <input class="form-control <?= ($validation->hasError('fotoTriI1')) ? 'is-invalid' : ''; ?>" name="fotoTriI1" type="file" id="fotoTriI1">
                                <small id="fotoTriI1Feedback" class="<?= ($validation->hasError('fotoTriI1')) ? 'invalid-feedback' : ''; ?>"><?= ($validation->hasError('fotoTriI1')) ? $validation->getError('fotoTriI1') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>

                        <div class="col mt-1 me-5">
                            <label for="formFile" class="form-label"></label>
                            <div class="col col-md-8 ">
                                <input class="form-control <?= ($validation->hasError('fotoTriI2')) ? 'is-invalid' : ''; ?>" name="fotoTriI2" type="file" id="fotoTriI2">
                                <small id="fotoTriI2Feedback" class="<?= ($validation->hasError('fotoTriI2')) ? 'invalid-feedback' : ''; ?>"><?= ($validation->hasError('fotoTriI2')) ? $validation->getError('fotoTriI2') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-3">
                            <label for="formFile" class="form-label">Triwulan II</label>
                            <div class="col col-md-8 ">
                                <input class="form-control <?= ($validation->hasError('fotoTriII1')) ? 'is-invalid' : ''; ?>" name="fotoTriII1" type="file" id="fotoTriII1">
                                <small id="fotoTriII1Feedback" class="<?= ($validation->hasError('fotoTriII1')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriII1')) ? $validation->getError('fotoTriII1') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>

                        <div class="col mt-4 me-5">
                            <label for="formFile" class="form-label"></label>
                            <div class="col col-md-8">
                                <input class="form-control <?= ($validation->hasError('fotoTriII2')) ? 'is-invalid' : ''; ?>" name="fotoTriII2" type="file" id="fotoTriII2">
                                <small id="fotoTriII2Feedback" class="<?= ($validation->hasError('fotoTriII2')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriII2')) ? $validation->getError('fotoTriII2') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-3">
                            <label for="formFile" class="form-label">Triwulan III</label>
                            <div class="col col-md-8">
                                <input class="form-control <?= ($validation->hasError('fotoTriIII1')) ? 'is-invalid' : ''; ?>" name="fotoTriIII1" type="file" id="fotoTriIII1">
                                <small id="fotoTriIII1Feedback" class="<?= ($validation->hasError('fotoTriIII1')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriIII1')) ? $validation->getError('fotoTriIII1') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>

                        <div class="col mt-4 me-5">
                            <label for="formFile" class="form-label"></label>
                            <div class="col col-md-8">
                                <input class="form-control <?= ($validation->hasError('fotoTriIII2')) ? 'is-invalid' : ''; ?>" name="fotoTriIII2" type="file" id="fotoTriIII2">
                                <small id="fotoTriIII2Feedback" class="<?= ($validation->hasError('fotoTriIII2')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriIII2')) ? $validation->getError('fotoTriIII2') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col mt-3">
                            <label for="formFile" class="form-label">Triwulan IV</label>
                            <div class="col col-md-8 ">
                                <input class="form-control <?= ($validation->hasError('fotoTriIV1')) ? 'is-invalid' : ''; ?>" name="fotoTriIV1" type="file" id="fotoTriIV">
                                <small id="fotoTriIV1Feedback" class="<?= ($validation->hasError('fotoTriIV1')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriIV1')) ? $validation->getError('fotoTriIV1') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>

                        <div class="col mt-4 me-5">
                            <label for="formFile" class="form-label"></label>
                            <div class="col col-md-8">
                                <input class="form-control <?= ($validation->hasError('fotoTriIV2')) ? 'is-invalid' : ''; ?>" name="fotoTriIV2" type="file" id="fotoTriIV2">
                                <small id="fotoTriIV2Feedback" class="<?= ($validation->hasError('fotoTriIV2')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriIV2')) ? $validation->getError('fotoTriIV2') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="modal-footer">
                    <button type="reset" class="btn reset-btn" form="tambahForm">Reset</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="tambahForm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" data-check="<?= (session()->get('cek')) ? 'true' : 'false'; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
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
                <form action="<?= base_url('/evaluasi_monev_lapangan/edit'); ?>" id="editForm" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Program :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('program')) ? 'is-invalid' : ''; ?>" id="program" name="program" required autocomplete="off" placeholder="Masukkan Program">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Kegiatan :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('kegiatan')) ? 'is-invalid' : ''; ?>" id="kegiatan" name="kegiatan" required autocomplete="off" value="<?= old('kegiatan'); ?>" placeholder="Masukkan Kegiatan">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Sub Kegiatan :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('subkegiatan')) ? 'is-invalid' : ''; ?>" id="subkegiatan" name="subkegiatan" required autocomplete="off" value="<?= old('subkegiatan'); ?>" placeholder="Masukkan Sub Kegiatan">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Pekerjaan :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= (session()->get('errorPekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" required autocomplete="off" value="<?= old('pekerjaan'); ?>" placeholder="Masukkan Pekerjaan">
                                <div id="pekerjaanFeedback" class="invalid-feedback">
                                    <?= session()->get('errorPekerjaan'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Anggaran :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control rupiah <?= ($validation->hasError('anggaran')) ? 'is-invalid' : ''; ?>" id="anggaran" name="anggaran" required autocomplete="off" value="<?= old('anggaran'); ?>" placeholder="Masukkan Anggaran (angka)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Alamat Lokasi :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" required autocomplete="off" value="<?= old('alamat'); ?>" placeholder="Masukkan Alamat Lokasi">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Nomor Kontrak :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nomorkontrak')) ? 'is-invalid' : ''; ?>" id="nomorkontrak" name="nomorkontrak" required autocomplete="off" value="<?= old('nomorkontrak'); ?>" placeholder="Masukkan Nomor Kontrak">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Nilai Kontrak :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control rupiah <?= ($validation->hasError('nilaikontrak')) ? 'is-invalid' : ''; ?>" id="nilaikontrak" name="nilaikontrak" required autocomplete="off" value="<?= old('nilaikontrak'); ?>" placeholder="Masukkan Nilai Kontrak (angka)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-n">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label">Pelaksana :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pelaksana')) ? 'is-invalid' : ''; ?>" id="pelaksana" name="pelaksana" required autocomplete="off" value="<?= old('pelaksana'); ?>" placeholder="Masukkan Pelaksana">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered border-secondary mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Uraian</th>
                                            <th scope="col">Triwulan I</th>
                                            <th scope="col">Triwulan II</th>
                                            <th scope="col">Triwulan III</th>
                                            <th scope="col">Triwulan IV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Perkembangan Fisik (%)</th>
                                            <td><input type="text" id="PerFisI" value="<?= old('PerFisI'); ?>" class="persen" name="PerFisI" placeholder="Masukkan"></td>
                                            <td><input type="text" id="PerFisII" value="<?= old('PerFisII'); ?>" class="persen" name="PerFisII" placeholder="Masukkan"></td>
                                            <td><input type="text" id="PerFisIII" value="<?= old('PerFisIII'); ?>" class="persen" name="PerFisIII" placeholder="Masukkan"></td>
                                            <td><input type="text" id="PerFisIV" value="<?= old('PerFisIV'); ?>" class="persen" name="PerFisIV" placeholder="Masukkan"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Realisasi Keuangan (Rp)</th>
                                            <td><input type="text" placeholder="Masukkan" id="realKeuI" value="<?= old('realKeuI'); ?>" class="rupiah" name="realKeuI"></td>
                                            <td><input type="text" placeholder="Masukkan" id="realKeuII" value="<?= old('realKeuII'); ?>" class="rupiah" name="realKeuII"></td>
                                            <td><input type="text" placeholder="Masukkan" id="realKeuIII" value="<?= old('realKeuIII'); ?>" class="rupiah" name="realKeuIII"></td>
                                            <td><input type="text" placeholder="Masukkan" id="realKeuIV" value="<?= old('realKeuIV'); ?>" class="rupiah" name="realKeuIV"></td>
                                        </tr>
                                        <tr>
                                            <input type="text" hidden id="totalInput" name="total">
                                            <th scope="row">Jumlah Total (Rp)</th>
                                            <td colspan="4" id="total">Rp 0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="formFile" class="form-label">Triwulan I</label>
                            <div class="col col-md-8 ">
                                <div class="mb-2">
                                    <img src="<?= base_url('/img/peta ini peta.jpeg'); ?>" alt="" class="img-fluid" id="gambarfotoTriI1">
                                </div>
                                <input class="form-control <?= ($validation->hasError('fotoTriI1')) ? 'is-invalid' : ''; ?>" name="fotoTriI1" type="file" id="fotoTriI1" onchange="previewImg('fotoTriI1', this)">
                                <small id="fotoTriI1Feedback" class="<?= ($validation->hasError('fotoTriI1')) ? 'invalid-feedback' : ''; ?>"><?= ($validation->hasError('fotoTriI1')) ? $validation->getError('fotoTriI1') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>

                        <div class="col mt-1 me-5">
                            <label for="formFile" class="form-label"></label>
                            <div class="col col-md-8 ">
                                <div class="mb-2">
                                    <img src="<?= base_url('/img/peta ini peta.jpeg'); ?>" alt="" class="img-fluid" id="gambarfotoTriI2">
                                </div>
                                <input class="form-control <?= ($validation->hasError('fotoTriI2')) ? 'is-invalid' : ''; ?>" name="fotoTriI2" type="file" id="fotoTriI2" onchange="previewImg('fotoTriI2', this)">
                                <small id="fotoTriI2Feedback" class="<?= ($validation->hasError('fotoTriI2')) ? 'invalid-feedback' : ''; ?>"><?= ($validation->hasError('fotoTriI2')) ? $validation->getError('fotoTriI2') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-3">
                            <label for="formFile" class="form-label">Triwulan II</label>
                            <div class="col col-md-8 ">
                                <div class="mb-2">
                                    <img src="<?= base_url('/img/peta ini peta.jpeg'); ?>" alt="" class="img-fluid" id="gambarfotoTriII1">
                                </div>
                                <input class="form-control <?= ($validation->hasError('fotoTriII1')) ? 'is-invalid' : ''; ?>" name="fotoTriII1" type="file" id="gambarfotoTriII1" onchange="previewImg('fotoTriII1', this)">
                                <small id="fotoTriII1Feedback" class="<?= ($validation->hasError('fotoTriII1')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriII1')) ? $validation->getError('fotoTriII1') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>

                        <div class="col mt-4 me-5">
                            <label for="formFile" class="form-label"></label>
                            <div class="col col-md-8">
                                <div class="mb-2">
                                    <img src="<?= base_url('/img/peta ini peta.jpeg'); ?>" alt="" class="img-fluid" id="gambarfotoTriII2">
                                </div>
                                <input class="form-control <?= ($validation->hasError('fotoTriII2')) ? 'is-invalid' : ''; ?>" name="fotoTriII2" type="file" id="gambarfotoTriII2" onchange="previewImg('fotoTriII2', this)">
                                <small id="fotoTriII2Feedback" class="<?= ($validation->hasError('fotoTriII2')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriII2')) ? $validation->getError('fotoTriII2') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-3">
                            <label for="formFile" class="form-label">Triwulan III</label>
                            <div class="col col-md-8">
                                <div class="mb-2">
                                    <img src="<?= base_url('/img/peta ini peta.jpeg'); ?>" alt="" class="img-fluid" id="gambarfotoTriIII1">
                                </div>
                                <input class="form-control <?= ($validation->hasError('fotoTriIII1')) ? 'is-invalid' : ''; ?>" name="fotoTriIII1" type="file" id="fotoTriIII1" onchange="previewImg('fotoTriIII1', this)">
                                <small id="fotoTriIII1Feedback" class="<?= ($validation->hasError('fotoTriIII1')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriIII1')) ? $validation->getError('fotoTriIII1') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>

                        <div class="col mt-4 me-5">
                            <label for="formFile" class="form-label"></label>
                            <div class="col col-md-8">
                                <div class="mb-2">
                                    <img src="<?= base_url('/img/peta ini peta.jpeg'); ?>" alt="" class="img-fluid" id="gambarfotoTriIII2">
                                </div>
                                <input class="form-control <?= ($validation->hasError('fotoTriIII2')) ? 'is-invalid' : ''; ?>" name="fotoTriIII2" type="file" id="fotoTriIII2" onchange="previewImg('fotoTriIII2', this)">
                                <small id="fotoTriIII2Feedback" class="<?= ($validation->hasError('fotoTriIII2')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriIII2')) ? $validation->getError('fotoTriIII2') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col mt-3">
                            <label for="formFile" class="form-label">Triwulan IV</label>
                            <div class="col col-md-8 ">
                                <div class="mb-2">
                                    <img src="<?= base_url('/img/peta ini peta.jpeg'); ?>" alt="" class="img-fluid" id="gambarfotoTriIV1">
                                </div>
                                <input class="form-control <?= ($validation->hasError('fotoTriIV1')) ? 'is-invalid' : ''; ?>" name="fotoTriIV1" type="file" id="fotoTriIV" onchange="previewImg('fotoTriIV1', this)">
                                <small id="fotoTriIV1Feedback" class="<?= ($validation->hasError('fotoTriIV1')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriIV1')) ? $validation->getError('fotoTriIV1') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>

                        <div class="col mt-4 me-5">
                            <label for="formFile" class="form-label"></label>
                            <div class="col col-md-8">
                                <div class="mb-2">
                                    <img src="<?= base_url('/img/Lambang_Bondowoso.png'); ?>" alt="" class="img-fluid" id="gambarfotoTriIV2">
                                </div>
                                <input class="form-control <?= ($validation->hasError('fotoTriIV2')) ? 'is-invalid' : ''; ?>" name="fotoTriIV2" type="file" id="fotoTriIV2" onchange="previewImg('fotoTriIV2', this)">
                                <small id="fotoTriIV2Feedback" class="<?= ($validation->hasError('fotoTriIV2')) ? 'invalid-feedback' : ''; ?>"> <?= ($validation->hasError('fotoTriIV2')) ? $validation->getError('fotoTriIV2') : 'Ukuran foto maksimal 2 mb'; ?></small>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="editForm">Simpan</button>
                </div>
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