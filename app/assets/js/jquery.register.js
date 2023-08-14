$(function() {

    $(document).on('submit', '.registerform', function() {
        var form = {}

        form.username = $('input[name="username"]').val(),
            form.mail = $('input[name="mail"]').val(),
            form.password = $('input[name="password"]').val(),
            form.password_v = $('input[name="password_v"]').val(),
             form.gender = $('.userlook > img').attr('gender'),
            form.code = $('.userlook > img').attr('code'),

        console.log(form);

        $.post(actions + 'register.php', { username : form.username , mail : form.mail , password : form.password , password_v : form.password_v , gender : form.gender, code : form.code }, function(data) {
            $.error.top(data, { 'scroll' : 'top' });
            if (data.type == 'success') {
                location.reload();
            }
        }, 'json');

        return false;
    });

});
