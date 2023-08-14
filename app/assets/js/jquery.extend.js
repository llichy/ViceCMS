$(function() {
    $.extend({
        error: function() { return this }
    });

    $.error.top = function(params, second) {
        var classname, html, position, seconda;

        params = $.extend({}, params);
        second = $.extend({}, second);
        seconda = ('scroll' in second) ? true : false;

        classname = (params.type == 'success') ? 'error e_top success' : 'error e_top';
        html = "<div class='" + classname + "'>" + params.message + "</div>";

        if ($('body > .error.e_top').length > 0) {
            if (params.type == 'success') {
                $('body > .error.e_top').addClass('success');
            } else {
                $('body > .error.e_top').removeClass('success');
            }

            $('body > .error.e_top').animate({'padding-bottom': '+=10px'}, 300).html(params.message).animate({'padding-bottom': '-10px'}, 300);
        } else {
            $('body').prepend(html);
        }

        if (seconda) {
            if (second.scroll == 'top') {
                position = "0";
            }

            $('html, body').animate({scrollTop: position}, 200);
        }

        return this;
    };

    $.error.remove = function() {
        $('.error').remove();
    };
});
