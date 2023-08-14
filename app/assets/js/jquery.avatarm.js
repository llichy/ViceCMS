$(function() {
    $.extend({
        switchAvatar: function(look) {
            if (!look) {
                look = avatar + '&direction=3&size=l&action=std';
            } else {
                look = avatar + look + "&direction=3&size=l&action=std";
            }

            $('.side > img').attr('src', look);

            return this;
        }
    });

    $('.pseudonyme').keyup(function() {
        var mailornick = $(this).val();

        $.post(actions + 'avatar_loginm.php', { mailornick : mailornick }, function(data) {
            $.switchAvatar(data.avatar);
        }, 'json');
    });

});