const show = document.querySelectorAll(".show");
const pass = document.querySelectorAll(".pd");
let submit = document.querySelector('.submit');

show.forEach(function(s, i){
    s.addEventListener("click", function(){
        if(s.checked == true){
            pass[i].type = "text";
        }else{
            pass[i].type = "password";
        }
    })
})

$('.passlama').on('focusin', function(){
    if($('.passlama').hasClass('is-invalid')){
        $('.passlama').removeClass('is-invalid');
    }
})

//min length dan max length

// $('.passcon').on('click', function(){
//     let passbarulength = $('.passbaru').val().length;
//     let passconlength = $('.passcon').val().length;

//     if(passconlength){

//     }
// })

$('.passbaru').on('focusin', function(){
        if($('.passbaru').hasClass('is-invalid')){
            $('.passbaru').removeClass('is-invalid');
        }
        if($('.passcon').hasClass('is-invalid')){
            $('.passcon').removeClass('is-invalid');
        }
})

$('.passcon').on('focusin', function(){
    if($('.passbaru').val().length <= 6){
        if($('.passbaru').hasClass('is-valid')){
            $('.passbaru').removeClass('is-valid');
        }
        $('#passbaruFeedback').text('password minimal 6 karakter');

        $('.passbaru').addClass('is-invalid');

    }else if($('.passbaru').val().length >= 15){
        if($('.passbaru').hasClass('is-valid')){
            $('.passbaru').removeClass('is-valid');
        }
        $('#passbaruFeedback').text('password maksimal 15 karakter');

        $('.passbaru').addClass('is-invalid');
    }
})

setInterval(function(){
    let passbaru = $('.passbaru').val();
    let passcon = $('.passcon').val();

    if(passbaru.length >= 6 && passbaru.length <= 15 && passbaru == passcon){
        if($('.passbaru').hasClass('is-invalid')){
            $('.passbaru').removeClass('is-invalid');
        }
        if($('.passcon').hasClass('is-invalid')){
            $('.passcon').removeClass('is-invalid');
        }

        $('.passbaru').addClass('is-valid');
        $('.passcon').addClass('is-valid');
    }else{
        if($('.passbaru').hasClass('is-valid')){
            $('.passbaru').removeClass('is-valid');
        }
        if($('.passcon').hasClass('is-valid')){
            $('.passcon').removeClass('is-valid');
        }

        submit.disabled = true;

    }

    if(passbaru.length >= 6 && passbaru.length <= 15){
        if($('.passbaru').hasClass('is-invalid')){
            $('.passbaru').removeClass('is-invalid');
        }
    }

    if(passcon != passbaru && passcon.length >= passbaru.length){
        if($('.passcon').hasClass('is-valid')){
            $('.passcon').removeClass('is-valid');
        }

        $('.passcon').addClass('is-invalid');
    }

    if(passbaru.length >= 6 && passbaru.length <= 15 && passbaru == passcon && $('.passbaru').hasClass('is-invalid') == false && $('.passcon').hasClass('is-invalid') == false){
        submit.disabled = false;
    }

}, 400)

















// setInterval(
// function(){
//   if($(".passbaru").val().length < 1 && $(".passcon").val().length < 1 && $(".passlama").val().length < 1){
//     submit.disabled = true;
//   }else if($(".passbaru").hasClass('is-invalid') && $(".passcon").hasClass('is-invalid') && $(".passlama").hasClass('is-invalid')){
//     submit.disabled = true;
//   }
//   if($(".passbaru").val() != $(".passcon").val()){
//     if($(".passbaru").hasClass('is-valid') && $(".passcon").hasClass('is-valid')){
//       $(".passbaru").removeClass('is-valid');
//       $(".passcon").removeClass('is-valid');
//       submit.disabled = true;
//     }
//   }

//   if($(".passbaru").val() == $(".passcon").val() && $(".passbaru").val().length > 6 && $(".passbaru").val().length < 15){
//     if($(".passbaru").hasClass('is-valid') == false && $(".passcon").hasClass('is-valid') == false){
//       $(".passbaru").addClass('is-valid');
//       $(".passcon").addClass('is-valid');
//       submit.disabled = false;
//     }
//   }
// }, 400);

//     $(".passbaru").on('keyup', function(){
//       if($(".passbaru").val().length > 15){
//         if($(".passbaru").hasClass('is-valid')){
//           $(",passbaru").removeClass('is-valid');
//         }
//         $(".passbaru").addClass('is-invalid');
//         $("#passbaruFeedback").text('password maksimal 15 karakter');
//         submit.disabled = true;
//       }else{
//         if($(".passbaru").hasClass('is-invalid')){
//           $(".passbaru").removeClass('is-invalid');
//         }
//       }
//     })

//     $(".passbaru").on('focusin', function(){
//       if($(".passbaru").hasClass('is-invalid')){
//         $(".passbaru").removeClass('is-invalid')
//       }
//     })

//     $(".passcon").on('click', function(){
//       let passbaru = $(".passbaru").val();
//       if(passbaru.length < 6){
//         if($(".passbaru").hasClass('is-valid')){
//           $(".passbaru").removeClass('is-valid')
//         }
//         $(".passbaru").addClass('is-invalid');
//         $("#passbaruFeedback").text('password minimal 6 karakter');
//         submit.disabled = true;
//       }
//     })

//     $(".passcon").on('keyup', function(){
//         let passbaru = $(".passbaru").val();
//         let passcon = $(".passcon").val();
//         if(passcon.length >= passbaru.length && passcon !== passbaru){
//           submit.disabled = true;
//           if($(".passcon").hasClass('is-valid')){
//             $(".passcon").removeClass('is-valid');
//           }
//           if($(".passbaru").hasClass('is-valid')){
//             $(".passbaru").removeClass('is-valid');
//           }
//           $(".passcon").addClass('is-invalid');
//           $("#passconFeedback").text('konfirmasi password salah');
//         }else if(passcon == passbaru && $(".passbaru").hasClass('is-invalid') == false){
//           submit.disabled = false;
//           if($(".passcon").hasClass('is-invalid')){
//             $(".passcon").removeClass('is-invalid');
//           }
//           $(".passcon").addClass('is-valid');
//           $(".passbaru").addClass('is-valid');
//         }else{
//             submit.disabled = true;
//             if($(".passcon").hasClass('is-invalid')){
//                 $(".passcon").removeClass('is-invalid');
//               }
//               if($(".passcon").hasClass('is-valid')){
//                 $(".passcon").removeClass('is-valid');
//               }
//               if($(".passbaru").hasClass('is-valid')){
//                 $(".passbaru").removeClass('is-valid');
//               }
//         }
//     })
