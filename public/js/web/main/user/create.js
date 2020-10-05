let url = $('#user-form').data('url');
let redirect = $('#redirect').val();

$("#user-form").submit(function(e) {
    e.preventDefault();
});

function submitData() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            username: $('#username').val(),
            email: $('#email').val(),
            name: $('#name').val(),
            level: $('#level').val(),
            position: $('#position').val(),
        },
        dataType: 'json',
        success: function(data, textStatus, xhr) {
            console.log(data);
            if (xhr.status == 200) {
                successAlert(data);
            }
        }
    })
}


function successAlert(message) {
    event.preventDefault();
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: message,
    }), setTimeout(function() {
        window.location.replace(redirect);
    }, 800);
};