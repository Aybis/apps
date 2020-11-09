   // froala
   $('textarea').froalaEditor({
    placeholderText: '',
    charCounterCount: false,
    heightMin: 200,
    key: '{{ env("KEY_FROALA") }}',
});

var gettglspph = document.getElementById('tglspph');
var nomornya = document.getElementById('nomorspph');
var tglnya = nomornya.value.split('/');
var nilai=[];
for (var i = 0; i < tglnya.length-1; i++) {
    nilai.push(tglnya[i]) ;
}
function useValue() {
    var NameValue = gettglspph.value.split('-');
    var year=gettglspph[2];
    document.getElementById('nomorspph').value = nilai.join('/')+'/'+NameValue[0];
    
}
gettglspph.onchange = useValue;
gettglspph.onblur = useValue;

// datatable
$(document).ready( function () {
    $('#mitra').DataTable();
} )
var table = document.getElementById('mitra');

for(var i = 1; i < table.rows.length; i++)
{
    table.rows[i].onclick = function()
    {
        //  rIndex = this.rowIndex;
        document.getElementById('idmitra').value = this.cells[0].innerHTML;
        document.getElementById("kepada").value = this.cells[1].innerHTML;
        
    };
};
// select2
$('select').select2();
function getRoles(val) {
    $('#role-cm_role_text').val('');
    var data = $('#role-cm_role').select2('data').map(function(elem){ return elem.text} );
    // console.log(data);
    $('#role-cm_role_text').val(data);
    $('#role-cm_role').on('select2:unselecting', function (e) {
        $('#role-cm_role_text').val('');
    });
}
// datepicker tanggal spph
$(".datejos").on("change", function() {
    this.setAttribute(
    "data-date",
    moment(this.value, "YYYY-MM-DD")
    .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")
$('.datejos').datepicker({
    autoclose: true,
    orientation: "bottom"
})

// datepicker tanggal sph
$.datetimepicker.setLocale('id');
$('.datepick').datetimepicker({theme:'dark'})

$('.timepick').datetimepicker({
    datepicker:false,
    format:'H:i',
    step:5
});
