// Call Function
$(document).ready(function () {
    listDraftSpph(getMonth + 1, d.getFullYear());
});


// Declare Variable
let url_draft = $('#draft').data('url');
let bulan = $('#bulan');
let tahun = $('#tahun');
let d = new Date();
var getMonth = d.getMonth();
let minTahun = (d.getFullYear() - 5);


// Declare Array Bulan
const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
    'September', 'Oktober', 'November', 'Desember','All'
];

// Insert Value Option Dropdown Bulan
months.forEach(function (i, index) {
    if (getMonth == index) {
        bulan.append("<option value=" + (index + 1) + " selected>" + i + "</option>")
    } else {
        bulan.append("<option value=" + (index + 1) + ">" + i + "</option>")
    }
})
// Insert Value Option Dropdown Tahun
for (let i = d.getFullYear(); i > minTahun; i--) {
    tahun.append('<option value="' + i + '">' + i + '</option>')
}

// OnClick Month Function
$('#bulan').change(function () {
    let m = $('#bulan').val();
    let y = $('#tahun').val();
    if (m != '' && y != '') {
        listDraftSpph(m, y);
    } else {
        alert('Both Date is required');
    }
});

// OnClick Year Function
$('#tahun').change(function () {
    let m = $('#bulan').val();
    let y = $('#tahun').val();
    if (m != '' && y != '') {
        listDraftSpph(m, y);
    } else {
        alert('Both Date is required');
    }
});


// Function ServerSide DataTable
function listDraftSpph(m, y) {
    $('#draft').dataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        async: true,
        scrollY: '50vh',
        // scrollCollapse: true,
        ajax: {
            url: url_draft,
            headers: {
                "Authorization": localStorage.getItem('token')
            },
            type: 'get',
            data: {
                month: m,
                year: y,
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'nomorspph',
                defaultContent: "NULL",
                fnCreatedCell: function (td, data) {
                    $(td).css('white-space', 'nowrap');
                    $(td).css('text-align', 'justify');
                    $(td).css('font-weight', 'bold');
                },
            }, {
                data: 'tglspph',
                defaultContent: "",
                fnCreatedCell: function (td, data) {
                    $(td).css('white-space', 'nowrap');
                },
                render : function(data){
                    return moment(data).format('DD.MMMM.Y');
                }
            }, {
                data: 'judul',
                defaultContent: "NULL",
                fnCreatedCell: function (td, data) {
                    $(td).css('text-align', 'justify');
                },
            }, {
                data: 'mitra_lkpps.perusahaan',
                defaultContent: "NULL",
                fnCreatedCell: function (td, data) {
                    $(td).css('white-space', 'nowrap');
                    $(td).css('font-weight', 'bold');
                },
            }, {
                data: 'tglsph',
                defaultContent: "",
                fnCreatedCell: function (td, data) {
                    $(td).css('white-space', 'nowrap');
                },
                render : function(data){
                    return moment(data).format('DD.MMMM.Y HH:mm');
                }
            }, {
                data: 'nomorspph',
                orderable: false,
                searchable: false,
                'defaultContent': "",
                render : function (nTd, sData, oData, iRow, iCol){
                    return `
                        <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown" class="btn bg-navy dropdown-toggle">Action <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                            <ul role="menu" class="dropdown-menu pull-right" style=" position: block;z-index: 10;">
                                <li>
                                    <a href="/preview-spph-lkpp/${oData.id}/" target="_blank" data-id="${oData.id}""><span class="icon fa fa-fw fa-file-code-o"></span>Preview</a>
                                </li>
                               <li>
                                    <a href="/edit-spph-lkpp/${oData.id}/" target="_blank" data-id="${oData.id}""><span class="icon fa fa-fw fa-edit"></span>Edit</a>
                                </li>
                                <li>
                                    <button id="delete-spph" data-url="/delete-spph-lkpp/${oData.id}" data-id="${oData.id}" class="btn btn-block btn-danger">Delete</button>
                                </li>
                            </ul>
                        </div>
                     `
                },
            }
        ],
    });
}

// Function sweet alert delete
$('#draft').on('click', '#delete-spph', function (e) {
    event.preventDefault();
    // get url from attribute
    const url = $(this).data('url');
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
            return fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText)
                    }
                    return response.json();
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Request failed: ${error}`
                    )
                })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            // reload table after success
            setTimeout(function () {
                $('#draft').DataTable().ajax.reload(null, false);
            }, 800);
        }
    })
});