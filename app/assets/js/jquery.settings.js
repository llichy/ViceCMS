$(function() {
    $('form.search').fadeIn(0);

    $(document).on('click', '.switchlogo', function() {
        $('.switchlogo').removeClass('slc');
        $(this).addClass('slc');
        $('form[name="logo"] > input[name="logonumber"]').val($(this).attr('number'));
        $('form[name="logo"]').submit();
    });

    $(document).on('click', '.switch_set', function() {
        var tthis = $(this),
            type = tthis.attr('tyoe'),
            classs = null;

        if (tthis.hasClass('inactivate')) {
            tthis.removeClass('inactivate').addClass('activate').text('Activé');

            $.post(actions + 'settings_noajax.php', { type : 'general' , 'set' : tthis.attr('tyoe') , 'action' : 'activate' }, function(data) {
                if (data.type == 'error') {
                    $.error.top(data, true);
                    tthis.removeClass('activate').addClass('inactivate').text('Désactivé');
                }
            }, 'json');
        } else if (tthis.hasClass('activate')) {
            tthis.removeClass('activate').addClass('inactivate').text('Désactivé');

            $.post(actions + 'settings_noajax.php', { type : 'general' , 'set' : tthis.attr('tyoe') , 'action' : 'inactivate' }, function(data) {
                if (data.type == 'error') {
                    $.error.top(data, true);
                    tthis.removeClass('inactivate').addClass('activate').text('Activé');
                }
            }, 'json');
        }
    });

    $(document).on('click', '.removebadge', function () {
        var tthis = $(this),
            action = actions + 'badge_remove.php',
            badgeid = tthis.attr('id'),
            badge = $('.badgeGestion[id="' + badgeid + '"]');

            badge.fadeOut(0);

        $.post(action, { badgeid : badgeid }, function (data) {
            if (data.type == 'error') {
                $.error.top(data, { 'scroll' : 'top' });

                badge.fadeIn(0);
            } else {
                badge.remove();
                $.error.remove();

                if ($('.badgeGestion').length < 1) {
                    $('.badgelist').append('<div class="error">Tu n\'as aucun badge pour le moment</div>');
                }
            }
        }, 'json');

        return false;
    });

    $(document).on('click', '.badgeGestion', function () {
        var tthis = $(this),
            action = actions + 'badge_slot.php',
            slot = tthis.attr('slot'),
            badgeid = tthis.attr('id'),
            text = "Clique sur moi pour me",
            newslot;

        if (slot == 1) {
            newslot = 0;
            tthis.attr('tooltip-content', text + ' porter');
        } else {
            newslot = 1;
            tthis.attr('tooltip-content', text + ' retirer');
        }

        tthis.attr('slot', newslot);

        $.post(action, { newslot : newslot , badgeid : badgeid }, function (data) {
            if (data.type == 'error') {
                $.error.top(data, { 'scroll' : 'top' });

                if (slot == 1) {
                    tthis.attr('tooltip-content', text + ' porter');
                } else {
                    tthis.attr('tooltip-content', text + ' retirer');
                }

                tthis.attr('slot', slot);
            } else {
                $.error.remove();
            }
        }, 'json');

        return false;
    });

    $(document).on('click', '.removeFriend', function () {
        var tthis = $(this),
            userid = tthis.attr('uid'),
            friend = $('.blocUser[id="' + userid + '"]');

        friend.fadeOut(0);

        $.post(actions + 'removeFriend.php', { userid : userid }, function (data) {
            if (data.type == 'error') {
                $.error.top(data, { 'scroll' : 'top' });

                friend.fadeIn(0);
            } else {
                friend.remove();
                $.error.remove();

                if ($('.blocUser').length < 1) {
                    $('.FRIENDSLLLLL').remove();
                    $('.contentFriends').append('<div class="error">Tu n\'as aucun ami.</div>');
                }
            }
        }, 'json');

        return false;
    });

    $(document).on('click', '.relationGestion', function () {
        var tthis = $(this),
            partner = tthis.attr('uid'),
            type = tthis.attr('type'),
            actual = $('.relationGestion.slc').attr('type');

        $('.relationGestion[uid="' + partner + '"]').removeClass('slc');
        tthis.addClass('slc');

        $.post(actions + 'settings_relationships.php', { partner : partner , type : type }, function (data) {
            if (data.type == 'error') {
                $.error.top(data, { 'scroll' : 'top' });

                $('.relationGestion[uid="' + partner + '"]').removeClass('slc');
                $('.relationGestion[type="' + actual + '"]').addClass('slc');
            }
        }, 'json');
    });


});