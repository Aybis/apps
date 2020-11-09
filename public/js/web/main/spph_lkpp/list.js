// Function on click button upload
$(document).on("click", ".upload", function () {
    console.log('testing');
    var idbro = $(this).data('id');
    $(".modal-body #idnya").val( idbro );
    $('#file').attr('action', "/file-spph-lkpp/" + idbro);
    $('#status').attr('action', "/status-spph-lkpp/" + idbro);
    $('#before').html(`Status Now  = ${$(this).data('status')}`);
});

// function typing number 
function formatAngka(objek, separator) {
    a = objek.value;
    b = a.replace(/[^\d]/g, "");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
            c = b.substr(i - 1, 1) + separator + c;
        } else {
            c = b.substr(i - 1, 1) + c;
            formatAngka
        }
    }
    objek.value = c;
}
// function remove . in number for insert data
function clearDot(number) {
    output = number.replace(".", "");
    return output;
}


// Call Function
$(document).ready(function () {
    listSpph(getMonth + 1, d.getFullYear());
});


// Declare Variable
let url_list = $('#list').data('url');
let bulan = $('#bulan');
let tahun = $('#tahun');
let d = new Date();
var getMonth = d.getMonth();
let minTahun = (d.getFullYear() - 5);


// Declare Array Bulan
const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
    'September', 'Oktober', 'November', 'Desember', 'All'
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
        listSpph(m, y);
    } else {
        alert('Both Date is required');
    }
});

// OnClick Year Function
$('#tahun').change(function () {
    let m = $('#bulan').val();
    let y = $('#tahun').val();
    if (m != '' && y != '') {
        listSpph(m, y);
    } else {
        alert('Both Date is required');
    }
});


// Function ServerSide DataTable
function listSpph(m, y) {
    $('#list').dataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        async: true,
        scrollY: '50vh',
        // scrollCollapse: true,
        ajax: {
            url: url_list,
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
                defaultContent: "",
            }, {
                data: 'tglspph',
                defaultContent: "",
                fnCreatedCell: function (td, data) {
                    $(td).css('white-space', 'nowrap');
                },
                render : function(data){
                    return moment(data).format('DD.MMMM.Y');
                }
            },
            {
                data: 'judul',
                defaultContent: "",
                fnCreatedCell: function (td, data) {
                    $(td).css('text-align', 'justify');
                },
            },
            {
                data: 'mitra_lkpps.perusahaan',
                defaultContent: "",
            },
            {
                data: 'tglsph',
                defaultContent: "",
                fnCreatedCell: function (td, data) {
                    $(td).css('white-space', 'nowrap');
                },
                render : function(data){
                    return moment(data).format('DD.MMMM.Y HH:mm');
                }
            },{
                data: 'nomorspph',
                orderable: false,
                searchable: false,
                'defaultContent': "",
                render : function (nTd, sData, oData, iRow, iCol){
                        return `
                        <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown" class="btn bg-navy dropdown-toggle">Action <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li>
                                    <a href="" data-toggle="modal" id="upload-file" class="upload" data-target="#modal-upload" data-id="${oData.id}""><span class="icon fa fa-file-text-o"></span>Upload File</a>
                                </li>
                                <li>
                                    <a href="" data-toggle="modal" id="upload-lampiran" class="upload"  data-target="#modal-lampiran" data-id="${oData.id}""><span class="icon fa fa-file-pdf-o"></span>Upload Lampiran</a>
                                </li>
                                <li>
                                <a href="/preview-spph-lkpp/${oData.id}" target="_blank"  data-id="${oData.id}""><span class="icon fa fa-file-code-o"></span>Preview</a>
                            </li>
                                <li>
                                </li>
                            </ul>
                        </div>
                        `
                },
            }
        ],
    });
}

$(document).on("click", "#upload-lampiran", function () {
    let idLampiran = $(this).data('id');
    $('#lampiran').attr('action',"lampiran-spph-lkpp/"+idLampiran);
}); 
$(document).on("click", "#upload-file", function () {
    let idFile = $(this).data('id');
    $('#form-file').attr('action',"file-spph-lkpp"+idFile);
}); 

// Function change status 
// const { value: fruit } = await Swal.fire({
//     title: 'Select field validation',
//     input: 'select',
//     inputOptions: {
//       apples: 'Apples',
//       bananas: 'Bananas',
//       grapes: 'Grapes',
//       oranges: 'Oranges'
//     },
//     inputPlaceholder: 'Select a fruit',
//     showCancelButton: true,
//     inputValidator: (value) => {
//       return new Promise((resolve) => {
//         if (value === 'oranges') {
//           resolve()
//         } else {
//           resolve('You need to select oranges :)')
//         }
//       })
//     }
//   })
  
//   if (fruit) {
//     Swal.fire(`You selected: ${fruit}`)
//   }