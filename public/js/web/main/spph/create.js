let dataMitra = [];
const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
const nomorSpph = document.getElementById('nomor_spph');
const judulSpph = document.getElementById('judul');
const urlMitra = $('#tbl_mitra').data('url');
const urlUser = $('#penanggung_jawab').data('url');
const penanggungJawab = $('#penanggung_jawab');


// get data user for select2
$.get(urlUser, function (data) {
    data.forEach(function (index) {
        if(penanggungJawab.data('old') == index.name){
            penanggungJawab.append(`<option value="${index.name}" data-position="${index.position}" selected>${index.name} - ${index.position}</option>`)
        }else{
            penanggungJawab.append(`<option value="${index.name}" data-position="${index.position}">${index.name} - ${index.position}</option>`)
        }
    });
});

// get data mtira for datatable mitra
$.get(urlMitra, function (data) {
    getAllData(data);
})


/* Function froala */
new FroalaEditor('#froala', {
    heightMin: 200,
})

/* Function datetimepicker */
$(function () {
    $(".datejos").on("change", function () {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format(this.getAttribute("data-date-format"))
        )
    }).trigger("change")
});


$('.datejos').datepicker({
    orientation: "bottom"
});


$.datetimepicker.setLocale('id');
$('.datepick').datetimepicker({
    theme: 'dark'
})


// make tabla header with 100%
$('.modal').on('shown.bs.modal', function () {
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
});

// select2
// $('select').select2();


// function datatable mitra 
function getAllData(data) {
    $('#tbl_mitra').DataTable({
        scrollY: "500px",
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
        data: data,
        columns: [{
                data: 'id',
            },
            {
                data: "nama",
                defaultContent: "NULL",
            }, {
                data: "alamat",
                defaultContent: "NULL",
            }, {
                data: "direktur",
                defaultContent: "NULL",
            }, {
                data: "email",
                defaultContent: "NULL",
            }, {
                data: "phone",
                defaultContent: "NULL",
            }, {
                data: "id",
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return `<a href="#" class="btn btn-primary pilih" data-id="${row.id}" data-nama="${row.nama}" data-alamat="${row.alamat}" data-dismiss="modal" id="tutup">Pilih</a>`
                },
            }
        ],


    });
}


// function click mitra 
$(document).on('click', '.pilih', function () {
    let namaMitra = $(this).data('nama');
    let alamatMitra = $(this).data('alamat');
    let idMitra = $(this).data('id');

    $('#mitra_id').val(idMitra);
    $('#nama_mitra').val(namaMitra);
    $('#namaMitra').html(namaMitra);
    $('#alamatMitra').html(alamatMitra);
})


/* Function tanggal spph */
$('#tanggal_spph').on('change', function () {
    let val = $(this).val();
    let getDate = new Date(val);
    let getYear = getDate.getFullYear();
    let getMonth = getDate.toLocaleString('id-ID', {
        month: 'long'
    });
    let getLastVal = $(this).val().split('-');
    let getNoSpph = $('#nomor_spph').data('old').split('/');
    $('#nomor_spph').val(`${getNoSpph[0]}/LG.220/PIN.00.00/${getLastVal[0]}`);

    let tanngal_spph = getDate.getDate() + ' ' + getMonth + ' ' + getYear;
    $('#tanggalSpph').html(tanngal_spph);
});


/*Function nomor spph */
nomorSpph.addEventListener('keyup', function () {
    let val = this.value;
    let tanggal_spph = $('#tanggal_spph').val();
    let split_date = tanggal_spph.split('-');

    let getDate = new Date(tanggal_spph);
    let getMonth = getDate.toLocaleString('id-ID', {
        month: 'long'
    });
    $('#tglSpph').html(`${split_date[2]} ${getMonth.toUpperCase()} ${split_date[0]}`);
    $('#nomorSpph').html(val);
});


/* Function tanggal sph */
$('#tanggal_sph').on('change', function () {

    let val = $(this).val();
    let date = new Date(val);
    let getDay = date.getDay();
    let getYear = date.getFullYear();
    let getMonth = date.toLocaleDateString('id-ID', {
        month: 'long',
    });

    let dateToString = `${date.getDate()} ${getMonth} ${getYear}`;
    let timeToString = `${(date.getHours() < 10 ? '0':'') + date.getHours()} : ${(date.getMinutes() < 10 ? '0':'') + date.getMinutes()}`;
    $('#tanggalSph').html(dateToString);
    $('#jamSph').html(timeToString);
    $('#hariSph').html(days[getDay]);
});


/* Function on change penanggung jawab */
penanggungJawab.on('change', function(){
    let val = $(this).val();
    let position = $(this).find(':selected').data('position');
    $('#namaTtd').html(val);
    $('.jabatanTtd').html(position);
});

/*Function judul spph */
judulSpph.addEventListener('keyup', function () {
    let val = this.value;
    $('#judulSpph').html(val);
});
