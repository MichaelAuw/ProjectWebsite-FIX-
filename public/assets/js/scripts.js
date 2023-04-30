/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

var countre=1;
function add_more_field(){
    countre+=1
    html=' <div class="row" id="row'+countre+'">\
            <div class="col-6">\
                <label>Product Name</label>\
                <input type="text" name="Skill['+countre+']" class="form-control" placeholder="e.g.(Java,HTML,CSS)">\
            </div>\
            <div class="col-4">\
                <label>Price</label>\
                <input type="number" name="Percentage['+countre+']" class="form-control" placeholder="(0-100)">\
            </div>\
        </div>'
    var form = document.getElementById('product_form');
    form.insertAdjacentHTML('beforeend', html)
}

function remove_field(){
    let number = countre
    let row = document.getElementById('row'+number)
    if(number > 1){
        row.remove();
        countre-=1
    }
    
}

const activePage = windows.location;
const navLinks = document.querySelectorAll('.btn-navbar').forEach(link =>{
    if(link.href === windows.location.href){
        link.setAttribute('btn-navbar','page')
    }
})
