const toastElement = document.getElementById('liveToast');
let option = {
    animation: true,
    delasy: 2000
};



$('.editButton').on('click', function(){
    $('.loader').show();

    let id = $(this).attr('data-id');
    $('#formEdit').attr('action', 'http://localhost:8080/jadwal/tambah/' + id);

    let jenis = $(this).attr('data-title');
    
    $('.jenis').val($(this).attr('data-title'));

    $.ajax({
        url: 'http://localhost:8080/jadwal/ambilData',
        type: 'post',
        data: {jenis : jenis},
        dataType: 'json',
        success: function(data){
            $('#awal').val(data.awal);
            $('#akhir').val(data.akhir);
            $('.loader').hide();
        }
    })
})

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

const checkbox = document.querySelectorAll('.checkbox');

function change(e){
    checkbox.forEach(function(item){
        if(item != e){
            item.checked = false;
            item.disabled = false;
        }else{
            item.disabled = true;
        }
    })

    let id = $(e).attr('data-id');

    $.ajax({
        url: 'http://localhost:8080/jadwal/aktivasi',
        type: 'post',
        data: {id: id},
        dataType: 'json',
        success: function(data){
            $string = `jadwal ${data.triwulan} sedang aktif`;

            $('.toast-body').text($string);
            
            const toastup = new bootstrap.Toast(toastElement, option);
            toastup.show();

            return data;
        }
    })
}


