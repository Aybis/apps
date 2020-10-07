const date = new Date();
const getMonth = date.getMonth();
const getYear = date.getFullYear();
const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
const month = document.getElementById('month');
const year = document.getElementById('year');

let optionMonth = months.map(function(element, index) {
    // create node child 
    let options = document.createElement('option');
    options.text = element;
    options.value = index + 1;

    if (index == (getMonth + 1)) {
        month.options[index].selected = 'selected';
    } else {
        month.appendChild(options);
    }
});


for (let i = getYear; i > (getYear - 3); i--) {
    let options = document.createElement('option');
    options.text = i;
    options.value = i;
    year.appendChild(options);
}

function getDataSpph(month, year)  {

}