<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<?= $this->include('admin/templates/navbar'); ?>

<section class="renja">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <h1 class="display-5 fw-bold">Jadwal</h1>
            </div>
            <div class="col-md-1">
                <a href="<?= base_url('/admin/home'); ?>"><i class="fas fa-hand-point-left fa-3x" data-bs-toggle="tooltip" data-placement="top" title="Kembali"></i></a>
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
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Jenis Dokumen</th>
                            <th scope="col">Waktu</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Evaluasi Triwulan I</td>
                            <td><?= $result[0]["awal"] . ' - ' . $result[0]["akhir"]; ?></td>
                            <td>
                                <button class="btn-primary btn-sm editButton" data-bs-toggle="modal" data-id="1" data-title="Evaluasi Triwulan I" data-bs-target="#exampleModal1" id="triwulanI"><i class="fas fa-edit"></i></button>
                                <div class="form-check form-switch float-end mt-1">
                                    <input class="form-check-input checkbox" onchange="change(this)" data-id="1" type="checkbox" id="flexSwitchCheckDefault" <?= ($result[0]['status'] == 'active') ? 'checked disabled' : ''; ?>>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Evaluasi Triwulan II</td>
                            <td><?= $result[1]["awal"] . ' - ' . $result[1]["akhir"]; ?></td>
                            <td>
                                <button class="btn-primary btn-sm editButton" data-bs-toggle="modal" data-id="2" data-title="Evaluasi Triwulan II" data-bs-target="#exampleModal1" id="triwulanII"><i class="fas fa-edit"></i></button>
                                <div class="form-check form-switch float-end mt-1">
                                    <input class="form-check-input checkbox" onchange="change(this)" data-id="2" type="checkbox" id="flexSwitchCheckDefault" <?= ($result[1]['status'] == 'active') ? 'checked disabled' : ''; ?>>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Evaluasi Triwulan III</td>
                            <td><?= $result[2]["awal"] . ' - ' . $result[2]["akhir"]; ?></td>
                            <td>
                                <button class="btn-primary btn-sm editButton" data-bs-toggle="modal" data-id="3" data-title="Evaluasi Triwulan III" data-bs-target="#exampleModal1" id="triwulanIII"><i class="fas fa-edit"></i></button>
                                <div class="form-check form-switch float-end mt-1">
                                    <input class="form-check-input checkbox" onchange="change(this)" data-id="3" type="checkbox" id="flexSwitchCheckDefault" <?= ($result[2]['status'] == 'active') ? 'checked disabled' : ''; ?>>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Evaluasi Triwulan IV</td>
                            <td><?= $result[3]["awal"] . ' - ' . $result[3]["akhir"]; ?></td>
                            <td>
                                <button class="btn-primary btn-sm editButton" data-bs-toggle="modal" data-id="4" data-title="Evaluasi Triwulan IV" data-bs-target="#exampleModal1" id="triwulanIV"><i class="fas fa-edit"></i></button>
                                <div class="form-check form-switch float-end mt-1">
                                    <input class="form-check-input checkbox" onchange="change(this)" data-id="4" type="checkbox" id="flexSwitchCheckDefault" <?= ($result[3]['status'] == 'active') ? 'checked disabled' : ''; ?>>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#e2edff" fill-opacity="1" d="M0,192L34.3,181.3C68.6,171,137,149,206,133.3C274.3,117,343,107,411,96C480,85,549,75,617,90.7C685.7,107,754,149,823,144C891.4,139,960,85,1029,106.7C1097.1,128,1166,224,1234,224C1302.9,224,1371,128,1406,80L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>
</section>

<!-- modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edit Jadwal</h5>
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
                <form action="<?= base_url('/jadwal/tambah'); ?>" method="post" id="formEdit">
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Jenis dokumen :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control bg-ligth jenis" value="Evaluasi Triwulan I" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Awal :</label>
                            <div class="col-md-8">
                                <input type="date" name="awal" id="awal" class="form-control date" placeholder="Waktu Awal" autofocus autocomplete="off" value="<?= '20' . date('y') . '-' . date('m') . '-' . date('d'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group mb-3">
                            <label for="" class="col-sm-3 col-form-label">Akhir :</label>
                            <div class="col-md-8">
                                <input type="date" name="akhir" id="akhir" class="form-control date" placeholder="Waktu Akhir" autofocus autocomplete="off">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="formEdit">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- toast -->

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto"><i class="fas fa-cog me-1"></i>Sistem</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">

        </div>
    </div>
</div>

<?= $this->endSection(); ?>