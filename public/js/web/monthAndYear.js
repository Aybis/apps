// Declare Variable
let bulan = $('#bulan');
let tahun = $('#tahun');
let d = new Date();
var getMonth = d.getMonth();
let minTahun = (d.getFullYear() - 5);

// Declare Array Bulan
const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
    'September', 'Oktober', 'November', 'Desember'
];

// Insert Value Option Dropdown Bulan
months.forEach(function (i, index) {
    // if (getMonth == index) {
    //     bulan.append("<option value=" + (index + 1) + " selected>" + i + "</option>")
    // } else {
        bulan.append("<option value=" + (index + 1) + ">" + i + "</option>")
    // }
})
// Insert Value Option Dropdown Tahun
for (let i = d.getFullYear(); i > minTahun; i--) {
    tahun.append('<option value="' + i + '">' + i + '</option>')
}