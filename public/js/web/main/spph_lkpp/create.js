// declare variable
let days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
// datatable
$(document).ready(function(){
    $('#mitra').DataTable();
})

// froala
$('textarea').froalaEditor({
    placeholderText: '',
    charCounterCount: false,
    heightMax: 500,
    // documentReady : true,   
    toolbarButtons: [
        'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 
        'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 
        'emoticons', 'fontAwesome', 'specialCharacters', 'paragraphFormat', 'lineHeight', '|',
        'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|','-',
        'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 
        'insertHR', 'selectAll', 'getPDF', 'print', 'help', 'html', 'fullscreen', '|', 
        'undo', 'redo'
    ],
    key: keyFroala,
});

// removo alert lisensi froala
$("div > a", ".fr-wrapper").css('display', 'none');

// function select from modal mitra
var tableMitra = document.getElementById('mitra');
for(var i = 1; i < tableMitra.rows.length; i++)
{
    tableMitra.rows[i].onclick = function()
    {
        //  rIndex = this.rowIndex;
        document.getElementById('idmitra').value = this.cells[0].innerHTML;
        document.getElementById("kepada").value = this.cells[1].innerHTML;
        $('#namaMitra').html(this.cells[1].innerHTML);
        $('#alamatMitra').html(this.cells[2].innerHTML);
    };
};

// select2
$('select').select2();
function getRoles(val) {
    $('#role-cm_role_text').val('');
    var data = $('#role-cm_role').select2('data').map(function(elem){ return elem.text} );
    $('#role-cm_role_text').val(data);
    $('#role-cm_role').on('select2:unselecting', function (e) {
        $('#role-cm_role_text').val('');
    });
}

// datepicker tanggal spph
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
    autoclose: true,
    orientation: "bottom"
});



// datepicker tanggal sph
$.datetimepicker.setLocale('id');
$('.datepick').datetimepicker({theme:'dark'})
$('.timepick').datetimepicker({
    datepicker:false,
    format:'H:i',
    step:5
});

// onchange and onkeyup 

// onchange tanggal to nomer BAK
$('#tglspph').on('change', function(){
    let getYear         = $(this).val().split('-');
    let getNoBakOnly    = $('#nomorspph').data('old').split('/');  
    $('#nomorspph').val(`${getNoBakOnly[0]}/LG.220/ECOM/PIN.00.00/${getYear[0]}`);
    let tanggal = $(this).val();
    const dateBakn  = new Date(tanggal);
    const monthBakn = dateBakn.toLocaleString('id-ID', {
                        month: 'long'
                    });
    const tglBakn   = dateBakn.getDate() + ' ' + monthBakn + ' ' + dateBakn.getFullYear();
    $('#tanggalSpph').html(tglBakn);
});

// change nomor bak
$('#nomorspph').change(function () {
    var nomor = $('#nomorspph').val();
    let tgl_baknya = $('#tglspph').val();
    let split_tgl = tgl_baknya.split('-');
    const date_bak = new Date(tgl_baknya);
    const month_bak = date_bak.toLocaleString('id-ID', {
        month: 'long'
    });
    $('#tglSpph').html(`${split_tgl[2]} ${month_bak.toUpperCase()} ${split_tgl[0]}`);
    $('#nomorSpph').html(nomor);
});

// onchange tanggal to nomer BAK
$('#tglsph').on('change', function(){
    let tanggal = $(this).val();
    const dateSph  = new Date(tanggal);
    const day = dateSph.getDay();
    const monthBakn = dateSph.toLocaleString('id-ID', {
                        month: 'long'
                    });
    const tglBakn   = dateSph.getDate() + ' ' + monthBakn + ' ' + dateSph.getFullYear();
    $('#tanggalSph').html(tglBakn);
    $('#jamSph').html(`${dateSph.getHours()} : ${(dateSph.getMinutes() < 10 ? '0':'') + dateSph.getMinutes()}`);
    $('#hariSph').html(days[day]);
});

// function onchange penanda tangan
$('#dari').on('change', function(){
    let jabatan = $(this).find(':selected').data('position');
    let nama    = $(this).val();
    $('#namaTtd').html(nama);
    $('.jabatanTtd').html(jabatan);
});

// function onchange judul
$('#judul').on('change', function(){
    let judul = $(this).val();
    $('#judulSpph').html(judul);
});