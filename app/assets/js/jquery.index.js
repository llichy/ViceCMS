 
$(function() {

        $.extend({
        switchAvatar: function(look) {
            if (!look) {
                look = 'http://newhabbo.me/habbo-imaging/avatarimage.php?figure=hhh&headonly=0&size=s&gesture=sml&direction=2&head_direction=2&action=std';
                $(".login-pseudo > img").attr('src', look);
            } else {
                look = "http://newhabbo.me/habbo-imaging/avatarimage.php?figure=" + look + "&headonly=0&size=s&gesture=sml&direction=2&head_direction=2&action=std";
                 $(".login-pseudo > img").attr('src', look);
            }


            return this;
        }
    });

    $('#pseudo_1').keyup(function() {
        var pseudo_1 = $(this).val();

        $.post("http://newhabbo.me/stafflink4896/app/actions/" + 'avatar_login.php', { pseudo_1 : pseudo_1 }, function(data) {
            $.switchAvatar(data.avatar);
        }, 'json');
    });


});