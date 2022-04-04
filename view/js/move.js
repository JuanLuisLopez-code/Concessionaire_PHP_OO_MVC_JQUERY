function move_log() {
    $(document).on("click", '#move_login', function() {
        if (localStorage.getItem('token') == null) {
            window.location.href = 'index.php?modules=login&op=login';
        }
    })
}

function check_login() {
    var token = localStorage.getItem('token');
    if (token) {
        ajaxPromise('modules/login/crtl/crtl_login.php?op=token_c', 'POST', 'JSON', { 'token': token })
            .then(function(data) {
                if (data == 'Tiempo excedido') {
                    localStorage.removeItem('token');
                } else {
                    $('#move_login').empty();
                    $('#move_login').html(
                        '<img src="' + data.avatar + '" style="width:25"></img>' +
                        '<ul class="subs">' +
                        '<li><a>' + data.username + '</a></li>' +
                        '</ul>'
                    );
                    $('<li><a class="hsubs" id="log_out" onclick="log_out()">Log out</a></li>').appendTo('.nav');
                }
                setInterval(function() {
                    check_login_interval();
                }, 600000);
            })
    }
}

function log_out() {
    localStorage.removeItem('token');
    $('#log_out').remove();
    $('#move_login').remove();
    $('<li><a class="hsubs" id="move_login">Indetify</a></li>').appendTo('.nav');
    ajaxPromise('modules/login/crtl/crtl_login.php?op=delete_session', 'POST', 'JSON')
    toastr["success"]("Session cerrada");
    location.reload();
    localStorage.removeItem('move');
    localStorage.removeItem('id');
    localStorage.removeItem('details');
}

$(document).ready(function() {
    move_log();
    check_login();
});