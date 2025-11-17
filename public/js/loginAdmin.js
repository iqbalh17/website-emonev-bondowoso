const pass = document.getElementById('pd');
const show = document.getElementById("show");

show.addEventListener("click", function(){
    if(show.checked == true){
        pass.type = "text";
    }else{
        pass.type = "password";
    }
})

setInterval(function(){
    if(pass.value.length > 1){
        tombol.disabled = false;
    }else{
        tombol.disabled = true;
    }
}, 500)

$(document).ready(function(){
    $('#show').on('click', function(){
        // if($('.pd').hasClass('is-invalid')){
        //     $('.pd').removeClass('is-invalid');
        // }
        console.log('halo');
    });
})

$('#pd').on('focusin', function(){
    if($('#pd').hasClass('is-invalid')){
        $('#pd').removeClass('is-invalid');
    }
});

// console.log($('.pd'));

// pass.addEventListener('click', function(){
//     console.log('halo');
// });
