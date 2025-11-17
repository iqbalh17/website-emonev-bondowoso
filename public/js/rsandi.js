$('#keyword').on('keyup', function(){
    let keyword = $('#keyword').val();

    $('.spinner-border').show();

    $.ajax({
        url: 'http://localhost:8080/reset/halo',
        data: {keyword: keyword},
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        type: 'post',
        dataType: 'html',
        success: function(data){
            $('#tbody').html(data);

            $('.resetbutton').on('click', function(){
                let id = $(this).attr('data-id');
                console.log(id);
                $('#reset').attr('action', 'http://localhost:8080/reset/' + id);
            })
            $('.spinner-border').hide();
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
       })
});

$('.resetbutton').on('click', function(){
    let id = $(this).attr('data-id');
    $('#reset').attr('action', 'http://localhost:8080/reset/' + id);
})

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl){
return new bootstrap.Tooltip(tooltipTriggerEl)
});
