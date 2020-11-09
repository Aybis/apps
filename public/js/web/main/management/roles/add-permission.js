$(document).ready(function(){
    let menu = $('.menu').map((_, el) => el.value).get();
    
    menu.forEach(function(i){
        console.log(i);
        
        $(`#${i}`).click(function () {
            let items = $(`sub-${i}`);
        items.not(this).prop('checked', this.checked);
    });
    })
   
});

$('#click').on('click', function(e){
    e.preventDefault();
   
})