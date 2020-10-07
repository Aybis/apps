var current = null;

const nomorSpph = document.getElementById('nomor_spph');
const tanggalSpph = document.getElementById('tanggal_spph');
const nomorSph = document.getElementById('nomor_sph');
const tanggalSph = document.getElementById('tanggal_sph');
const mitra = document.getElementById('mitra');
const judul = document.getElementById('judul');
const pic = document.getElementById('penanggung_jawab');


tanggalSpph.addEventListener('keyup', function() {
    console.log("test");
})

nomorSpph.addEventListener('keyup', function() {

    console.log(this.value);
})