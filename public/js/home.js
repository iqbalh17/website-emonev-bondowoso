let option = {
    animation: true,
    delasy: 2000
};

const toastElement = document.getElementById('liveToast');

if($("#liveToast").attr('data-cek') == 'true'){
    const toastup = new bootstrap.Toast(toastElement, option);
    toastup.show();
}

// console.log($("#liveToast").attr('data-cek'));

