const toastElement = document.getElementById('liveToast');

$(function () {
    const validasi = document.getElementById('validasi');
    const submit = document.getElementById('submit');
    let dokumenInput = document.getElementById('dokumen');
    let ttdInput = document.getElementById('ttd');

    $(".edit").click(function () {
        $('.loader').show();
        $(".modal-title").text('Edit Data');
        let id = $(this).attr('data-id');
        let jenis = $(this).attr('data-jenis');
        $('#form1').attr('action', 'http://localhost:8080/evaluasi_renja/edit/' + id);
        $('#jenis').val(jenis);
        $('#dokumen').val('');
        $('#ttd').val('');
        $('#submit').text('Ubah');
        validasi.checked = false;
        if ($("#dokumen").hasClass('is-invalid')) {
            $("#dokumen").removeClass('is-invalid');
        };
        if ($("#ttd").hasClass('is-invalid')) {
            $("#ttd").removeClass('is-invalid');
        }
        if ($("#NIP").hasClass('is-invalid')) {
            $("#NIP").removeClass('is-invalid');
        };
        dokumenInput.required = false;
        ttdInput.required = false;

        $.ajax({
            url: 'http://localhost:8080/evaluasi_renja/ambilData/',
            type: 'post',
            data: {id: id},
            dataType: 'json',
            success: function(data){
                $('#namaPA').val(data.nama);
                $('#NIP').val(data.nip);
                $('.loader').hide();
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        })
    })

    $('.tambah').on('click', function () {
        $('.modal-title').text("Tambah Data");
        $('#form1').attr('action', 'http://localhost:8080/evaluasi_renja/tambah');
        $('#dokumen').val('');
        $('#ttd').val('');
        $('#namaPA').val('');
        $('#NIP').val('');
        $('#submit').text('Simpan');
        validasi.checked = false;
        if ($("#dokumen").hasClass('is-invalid')) {
            $("#dokumen").removeClass('is-invalid');
        };
        if ($("#ttd").hasClass('is-invalid')) {
            $("#ttd").removeClass('is-invalid');
        }
        if ($("#NIP").hasClass('is-invalid')) {
            $("#NIP").removeClass('is-invalid');
        };
    })

    setInterval(function () {
        if (validasi.checked == true) {
            submit.disabled = false;
        } else {
            submit.disabled = true;
        }
    }, 400)

    if ($('#exampleModal').attr('data-cek') == 'show') {
        $("#exampleModal").modal('show');
        let modal = $("#exampleModal").attr('data-edit');
        if (modal == 'edit') {
            $(".modal-title").text('Edit Data');
            let id = $("#exampleModal").attr('data-id');
            console.log(id);
            $('#form1').attr('action', 'http://localhost:8080/evaluasi_renja/edit/' + id);
            $('#dokumen').val('');
            $('#ttd').val('');
            $('#submit').text('Ubah');
            dokumenInput.required = false;
            ttdInput.required = false;
        } else {
            $('.modal-title').text("Tambah Data");
            $('#form1').attr('action', 'http://localhost:8080/evaluasi_renja/tambah');
            $('#dokumen').val('');
            $('#ttd').val('');
            $('#submit').text('Tambah');
        }
    }

    $(".delete").on('click', function () {
        let id = $(this).attr('data-id');
        $('#delete').attr('action', 'http://localhost:8080/evaluasi_monev_lapangan/' + id);
    });

})

function cek(input) {
    if (document.getElementById(`${input}`).classList.contains('is-invalid')) {
        if (document.getElementById(`${input}`).files.length == 1) {
            document.getElementById(`${input}`).classList.remove('is-invalid');
        }
    }
}

let option = {
    animation: true,
    delasy: 2000
};



if ($("#liveToast").attr('data-check') == 'true') {
    const toastup = new bootstrap.Toast(toastElement, option);
    toastup.show();
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});
