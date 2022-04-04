function protecturl() {
    var token = localStorage.getItem('token');
    ajaxPromise('modules/login/crtl/crtl_login.php?op=controluser', 'POST', 'JSON', { 'token': token })
        .then(function(data) {
            if (data == "valido") {} else if (data == "anonimo") {
                if (localStorage.getItem('token')) {
                    localStorage.removeItem('token');
                    localStorage.removeItem('move');
                    log_out();
                }
            }
        })
}

function refresh_session() {
    ajaxPromise('modules/login/crtl/crtl_login.php?op=refresh_session', 'POST', 'JSON')
}

function refresh_token() {
    if (localStorage.getItem('token')) {
        var token = localStorage.getItem('token');
        ajaxPromise('modules/login/crtl/crtl_login.php?op=refresh_token', 'POST', 'JSON', { 'token': token })
            .then(function(data) {
                console.log(data)
                localStorage.setItem('token', data);
            })
    }
}

function check_login_interval() {
    ajaxPromise('modules/login/crtl/crtl_login.php?op=actividad', 'POST', 'JSON')
        .then(function(data) {
            if (data != "activo") {
                log_out();
            }
        })
}

$(document).ready(function() {
    setInterval(function() {
        refresh_session();
        refresh_token();
    }, 600000);
    protecturl();
});