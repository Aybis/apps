const url = $('#table-roles').data('url');
const url_data = `${url}/data`;
const url_add = url;
const url_update = `${url}/update`;
// ------------------------------function get data------------------------------

getAllData();

function getAllData() {
    $('#table-roles').DataTable({
        scrollY: "350px",
        pagingType: "full_numbers",
        destroy: true,
        responsive: true,
        processing: true,
        async: true,
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        },
        ajax: {
            url: url_data,
            dataSrc: "",
            type: 'get',
        },
        columns: [{
            data: 'id',
        }, {
            data: "name",
            defaultContent: "NULL",
        }, {
            data: "display",
            defaultContent: "NULL",
        }, {
            data: "id",
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                return `
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu" >
                                <a href="#modal" id="update-roles" data-toggle="modal" data-id="${row.id}" data-name="${row.name}" data-display="${row.display}" class="update dropdown-item" style="text-decoration: none;color: black;">
                                    <span class="mdi mdi-file-edit-outline"></span> 
                                    Edit Roles
                                </a>
                            <div class="dropdown-divider"></div>
                                <a href="/roles/add/${row.id}" class="upload dropdown-item" style="text-decoration: none;color: black;"><span class="mdi mdi-file-edit-outline"></span> Add Permissions</a>
                            <div class="dropdown-divider"></div>
                                <a href="/roles/${row.id}" class="upload dropdown-item" style="text-decoration: none;color: black;"><span class="mdi mdi-file-edit-outline"></span> Edit Permissions</a>                                
                            <div class="dropdown-divider"></div>
                            <li class="dropdown-item" style="padding:0">
                                <button type="button" id="delete" class="btn btn-block btn-sm btn-danger" data-id="${row.id}">Delete</button>
                            </li>
                        </div>
                    </div>
                    `
            },
        }],


    });
}
// ------------------------------ end function get data ------------------------------


// ------------------------------ funtion on click add or edit ------------------------------

// function on click add 
$('#add-roles').on('click', function () {
    // change html and attribute
    $('input').val('');
    $('#status').val("add");
    $('#label').html('Add Role');
    $('#submit').html('Add Role');
})

// function on click edit
$(document).on("click", ".update", function () {
    // declare variable
    let id = $(this).data('id');
    let name = $(this).data('name');
    let display = $(this).data('display');

    // change html and attribute
    $('#status').val("edit");
    $('#label').html('Update Role');
    $('#submit').html('Update');

    // onchange value
    $('#name').val(name);
    $('#display').val(display);
});

// ------------------------------ end function on click add or edit ------------------------------


$(document).on("submit", "#form", function (e) {

    e.preventDefault();

    let set = $('#status').val();
    let name = $('#name').val();
    let display = $('#display').val();
    let data = [];


    data['name'] = name;
    data['display'] = display;

    if (set == 'add') {
        addData(data);
    } else {
        updateData(data);
    }
});

function addData(data) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            name : $('#name').val(),
            display : $('#display').val(),
        },
        dataType: 'json',
        success: function(data, response) {
            successAlert(data.display);
        },
        error : function (response){
            
            if(response.status != 500){
                let name = response.responseJSON.errors.name == null ? '' : response.responseJSON.errors.name;
                let display = response.responseJSON.errors.display == null ? '' : response.responseJSON.errors.display;
                $('#name-error').text(name)
                $('#display-error').text(display)
            }else{
                errorAlert(response.responseJSON.message);
            }
            
        }
    })
}

function updateData(data) {
    console.log(data);
}

function successAlert(message) {
    event.preventDefault();
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text:`${message} created sucessfully`,
    }), setTimeout(function() {
        $('#modal').modal('toggle');

        $('#table-roles').DataTable().ajax.reload(null, false);
    }, 800);
};

function errorAlert(message) {
    event.preventDefault();
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: message,
    });
};