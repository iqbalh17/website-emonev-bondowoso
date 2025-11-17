const show = document.getElementById("show");
const pass = document.getElementById("pd");
const tombol = document.getElementById("tombol");
const nama = document.getElementById("nama");
const invalid = document.getElementById("namaFeedback");


// pass.addEventListener("click", function(){
//     if(nama.value == "Pilih Nama OPD"){
//         nama.classList.add('is-invalid');
//         invalid.innerHTML = 'Pilih Nama OPD';
//     }
// });

show.addEventListener("click", function(){
    if(show.checked == true){
        pass.type = "text";
    }else{
        pass.type = "password";
    }
})

setInterval(function(){
    if(pass.value.length > 1 && nama.value != "Pilih Nama OPD"){
        tombol.disabled = false;
    }else{
        tombol.disabled = true;
    }
}, 500)

$('#pd').on('focusin', function(){
    if($('#pd').hasClass('is-invalid')){
        $('#pd').removeClass('is-invalid');
    }
});
