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

function showPass() {
    let pass = document.getElementById("password");
    if (pass.type === "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}

function showPassKader() {
    let pass = document.getElementById("password");
    let pass_conf = document.getElementById("password_conf");
    if (pass.type === "password" && pass_conf.type === "password") {
        pass.type = "text";
        pass_conf.type = "text";
    } else {
        pass.type = "password";
        pass_conf.type = "password";
    }
}

function showPassChangePass() {
    let pass = document.getElementById("current_password");
    let pass_new = document.getElementById("new_password");
    let pass_conf = document.getElementById("new_password_conf");
    if (pass.type === "password" && pass_conf.type === "password" && pass_new.type === "password") {
        pass.type = "text";
        pass_conf.type = "text";
        pass_new.type = "text";
    } else {
        pass.type = "password";
        pass_conf.type = "password";
        pass_new.type = "password";
    }
}

function showPassReset() {
    let pass = document.getElementById("password");
    let pass_conf = document.getElementById("password_conf");
    if (pass.type === "password" && pass_conf.type === "password") {
        pass.type = "text";
        pass_conf.type = "text";
    } else {
        pass.type = "password";
        pass_conf.type = "password";
    }
}

$(document).ready(function () {
    $('select').select2({
        theme: "bootstrap-5",
    });
});