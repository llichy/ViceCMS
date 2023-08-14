$(function() {
    $.extend({
        switchAvatar: function(look) {
            if (!look) {
                look = avatar + '&headonly=1&direction=2&size=s&action=std,crr=47';
            } else {
                look = avatar + look + "&headonly=1&direction=2&size=s&action=std,crr=47";
            }

            $('.avatarpseudo > img').attr('src', look);

            return this;
        }
    });

    $('.pseudonyme').keyup(function() {
        var mailornick = $(this).val();

        $.post(actions + 'avatar_login.php', { mailornick : mailornick }, function(data) {
            $.switchAvatar(data.avatar);
        }, 'json');
    });

});