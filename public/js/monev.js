var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

$(function(){
$('.rupiah').each(function(i){
    $(this).on('keyup', function(){
        $(this).val(rupiah(this.value, 'Rp '));
    })
});

$('#tambahModal .rupiah').on('keyup', function(){
    hitungRupiah(false)
})

$('#editModal .rupiah').on('keyup', function(){
    hitungRupiah(true)
})

function rupiah(angka, prefix){
    if(prefix != ''){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
    
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }else{
        var number_string = angka.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah = undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
}

function hitungRupiah(modalEdit) {
    if(modalEdit == false){
        var realkeu1 = Number(document.querySelector('#tambahModal #realKeuI').value.split('.').join("").split('Rp').join(""));
        var realkeu2 = Number(document.querySelector('#tambahModal #realKeuII').value.split('.').join("").split('Rp').join(""));
        var realkeu3 = Number(document.querySelector('#tambahModal #realKeuIII').value.split('.').join("").split('Rp').join(""));
        var realkeu4 = Number(document.querySelector('#tambahModal #realKeuIV').value.split('.').join("").split('Rp').join(""));

        var total = realkeu1 + realkeu2 + realkeu3 + realkeu4;

        var total = total.toString();
        var currencytotal = rupiah(total, '');

        document.querySelector('#tambahModal #totalInput').value = currencytotal;
        document.querySelector('#tambahModal #total').textContent = currencytotal;
    }else{
        var realkeu1 = Number(document.querySelector('#editModal #realKeuI').value.split('.').join("").split('Rp').join(""));
        var realkeu2 = Number(document.querySelector('#editModal #realKeuII').value.split('.').join("").split('Rp').join(""));
        var realkeu3 = Number(document.querySelector('#editModal #realKeuIII').value.split('.').join("").split('Rp').join(""));
        var realkeu4 = Number(document.querySelector('#editModal #realKeuIV').value.split('.').join("").split('Rp').join(""));

        var total = realkeu1 + realkeu2 + realkeu3 + realkeu4;

        var total = total.toString();
        var currencytotal = rupiah(total, '');


        document.querySelector('#editModal #totalInput').value = currencytotal;
        document.querySelector('#editModal #total').textContent = currencytotal;
    }
    
}

$('.persen').each(function(i){
    $(this).on('keyup', function(){
        $(this).val(persen(this.value));
    })
})

function persen(angka){
    var number_string = angka.replace(/[^,\d]/g, '').toString();

    return number_string;
}

if($('#tambahModal').attr('data-check') == 'true'){
    $('#tambahModal').modal('show');
}
    
})

$('.form-control').on('focusin', function(){
    if($(this).hasClass('is-invalid')){
        $(this).removeClass('is-invalid');
    }
})

$(".delete").on('click', function () {
    let id = $(this).attr('data-id');
    $('#delete').attr('action', 'http://localhost:8080/evaluasi_monev_lapangan/' + id);
});

$('.edit').on('click', function(){
    $('.loader').show();
    let id = $(this).attr('data-id');
    $('#editForm').attr('action', 'http://localhost:8080/evaluasi_monev_lapangan/edit/' + id);
    $('#editModal input').each(function(i) {
        if($(this).hasClass('is-invalid')){
            $(this).removeClass('is-invalid');
        }
        $(this).val('');
    })
        
    $.ajax({
        url: 'http://localhost:8080/evaluasi_monev_lapangan/ambilData',
        type: 'post',
        data: {id: id},
        dataType: 'json',
        success: function(data) {
            $('#editModal #program').val(data.program);
            $('#editModal #kegiatan').val(data.kegiatan);
            $('#editModal #subkegiatan').val(data.subkegiatan);
            $('#editModal #pekerjaan').val(data.pekerjaan);
            $('#editModal #anggaran').val(data.anggaran);
            $('#editModal #alamat').val(data.alamatLokasi);
            $('#editModal #nomorkontrak').val(data.nomorKontrak);
            $('#editModal #nilaikontrak').val(data.nilaiKontrak);
            $('#editModal #pelaksana').val(data.pelaksana);
            $('#editModal #PerFisI').val(data.PerFisI);
            $('#editModal #PerFisII').val(data.PerFisII);
            $('#editModal #PerFisIII').val(data.PerFisIII);
            $('#editModal #PerFisIV').val(data.PerFisIV);
            $('#editModal #realKeuI').val(data.realKeuI);
            $('#editModal #realKeuII').val(data.realKeuII);
            $('#editModal #realKeuIII').val(data.realKeuIII);
            $('#editModal #realKeuIV').val(data.realKeuIV);
            $('#editModal #totalInput').val(data.totaluang);
            $('#editModal #total').html(data.totaluang);
            if(data.fotoTriI1 != ''){
                $('#gambarfotoTriI1').attr('src', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriI1);
                $('#gambarfotoTriI1').attr('data-img', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriI1);
            }else{
                $('#gambarfotoTriI1').attr('src', 'http://localhost:8080/img/default-image.jpg');
            }
            
            if(data.fotoTriI2 != ''){
                $('#gambarfotoTriI2').attr('src', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriI2);
                $('#gambarfotoTriI2').attr('data-img', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriI2);
            }else{
                $('#gambarfotoTriI2').attr('src', 'http://localhost:8080/img/default-image.jpg');
            }

            if(data.fotoTriII1 != ''){
                $('#gambarfotoTriII1').attr('src', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriII1);
                $('#gambarfotoTriII1').attr('data-img', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriII1);
            }else{
                $('#gambarfotoTriII1').attr('src', 'http://localhost:8080/img/default-image.jpg');
            }

            if(data.fotoTriII2 != ''){
                $('#gambarfotoTriII2').attr('src', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriII2);
                $('#gambarfotoTriII2').attr('data-img', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriII2);
            }else{
                $('#gambarfotoTriII2').attr('src', 'http://localhost:8080/img/default-image.jpg');
            }

            if(data.fotoTriIII1 != ''){
                $('#gambarfotoTriIII1').attr('src', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriIII1);
                $('#gambarfotoTriIII1').attr('data-img', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriIII1);
            }else{
                $('#gambarfotoTriIII1').attr('src', 'http://localhost:8080/img/default-image.jpg');
            }

            if(data.fotoTriIII2 != ''){
                $('#gambarfotoTriIII2').attr('src', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriIII2);
                $('#gambarfotoTriIII2').attr('data-img', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriIII2);
            }else{
                $('#gambarfotoTriIII2').attr('src', 'http://localhost:8080/img/default-image.jpg');
            }

            if(data.fotoTriIV1 != ''){
                $('#gambarfotoTriIV1').attr('src', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriIV1);
                $('#gambarfotoTriIV1').attr('data-img', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriIV1);
            }else{
                $('#gambarfotoTriIV1').attr('src', 'http://localhost:8080/img/default-image.jpg');
            }

            if(data.fotoTriIV2 != ''){
                $('#gambarfotoTriIV2').attr('src', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriIV2);
                $('#gambarfotoTriIV2').attr('data-img', 'http://localhost:8080/monev/' + data.tahun + '/' + data.opd + '/' + data.pekerjaan + '/' + data.fotoTriIV2);
            }else{
                $('#gambarfotoTriIV2').attr('src', 'http://localhost:8080/img/default-image.jpg');
            }
            $('.loader').hide();
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
})

function previewImg(id, input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#gambar' + id).attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }else{
        if($('#gambar' + id).attr('data-img') != undefined){
            $('#gambar' + id).attr('src', $('#gambar' + id).attr('data-img'));
        }else{
            $('#gambar' + id).attr('src', 'http://localhost:8080/img/default-image.jpg');
        }
    }
}

const toastElement = document.getElementById('liveToast');

let option = {
    animation: true,
    delasy: 2000
};



if ($("#liveToast").attr('data-check') == 'true') {
    const toastup = new bootstrap.Toast(toastElement, option);
    toastup.show();
}