// function create user 
let url_add = $('#user-add').data('url');
let url = $('#list-user').data('url');
let id = '';
// ------------------------------function get data------------------------------
$(document).ready(function() {
    getAllData();
});


function getAllData() {
    $('#list-user').DataTable({
        scrollY: "500px",
        pagingType: "full_numbers",
        destroy: true,
        responsive: true,
        processing: true,
        // serverSide: true,
        async: true,
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        },
        ajax: {
            url: url,
            dataSrc: "",
            type: 'get',
        },
        columns: [{
                data: 'id',
            },
            {
                data: "username",
                defaultContent: "NULL",
            }, {
                data: "name",
                defaultContent: "NULL",
            }, {
                data: "email",
                defaultContent: "NULL",
            }, {
                data: "level",
                defaultContent: "NULL",
            }, {
                data: "position",
                defaultContent: "NULL",
            }, {
                data: "id",
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
            <div class="btn-group dropleft">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                <div class="dropdown-menu" >
                            <a href="#edit-user" id="update-user" data-toggle="modal" data-id="${row.id}" data-name="${row.name}" data-username="${row.username}"  data-email="${row.email}" data-role="${row.level}" data-position="${row.position}" class="upload dropdown-item"  title="Upload Lampiran" style="text-decoration: none;color: black;"><span class="mdi mdi-file-edit-outline"></span> Edit User</a>
                    
                    <div class="dropdown-divider"></div>
                    
                    <li class="dropdown-item" style="padding:0">
                        <button type="button" id="delete" class="btn btn-block btn-sm btn-danger" data-id="${row.id}">Delete</button>
                    </li>
                </div>
            </div>
            `
                },
            }
        ],


    });
}

// ------------------------------ end function get data ------------------------------
//------------------------------ function add user ------------------------------

$("#user-add").submit(function(e) {
    e.preventDefault();
});

function addData() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type: 'POST',
        url: url_add,
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



//------------------------------ end function add ------------------------------

// ------------------------------ function edit user ------------------------------
// add url after click 
$(document).on("click", ".upload", function() {
    let id = $(this).data('id');
    let username = $(this).data('username');
    let email = $(this).data('email');
    let name = $(this).data('name');
    let role = $(this).data('role');
    let position = $(this).data('position');


    $('#id').val(id);
    $('#username-edit').val(username);
    $('#email-edit').val(email);
    $('#name-edit').val(name);
    $('#role-edit').val(role);
    $('#position-edit').val(position);
});

$("#user-edit").submit(function(e) {
    e.preventDefault();
});

function editData() {
    let id = $('#id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type: 'PUT',
        url: `${url}/${id}`,
        data: {
            username: $('#username-edit').val(),
            email: $('#email-edit').val(),
            name: $('#name-edit').val(),
            level: $('#role-edit').val(),
            position: $('#position-edit').val(),
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

//------------------------------ end function edit user ------------------------------





//------------------------------ end function delete user ------------------------------

// Function sweet alert delete
$('#list-user').on('click', '#delete', function(e) {
    event.preventDefault();
    // get url and id from attribute
    let id = $(this).data('id');

    // declare sweet alert
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showLoaderOnConfirm: true,

        // ajax catch data
        preConfirm: (data) => {
            return $.ajax({
                type: 'DELETE',
                url: `${url}/${id}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // if (!data.ok) {
                    //     throw new Error(data.statusText)
                    // }
                    // return data.json();
                },
                error: function(data) {
                    Swal.showValidationMessage(
                        `Request failed: ${data}`
                    )
                }

            })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                )
                // reload table after success
            setTimeout(function() {
                $('#list-user').DataTable().ajax.reload(null, false);
            }, 800);
        }
    })
});
//------------------------------ end function delete user ------------------------------

function successAlert(message) {
    event.preventDefault();
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: message,
    }), setTimeout(function() {
        $('#edit-user').modal('toggle');

        $('#list-user').DataTable().ajax.reload(null, false);
    }, 800);
};