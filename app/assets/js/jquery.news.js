$(function () {

              
                $(document).on('click', 'form[name="del_com"]', function () {
                var tthis = $(this),
                action = actions + tthis.attr('action'),
                commentid = $('> input[name="commentid"]', tthis).val(),
                articleid = $('> input[name="articleid"]', tthis).val(),
                commentBox = $('.MSG.intern[id="' + commentid + '"]');

                commentBox.fadeOut(0);

                $.post(action, {commentid: commentid, articleid: articleid}, function (data) {
                if (data.type == 'error') {
                if ($('.error.msgbox').length < 1) {
                $('.content.comments').prepend('<div class="error msgbox">' + data.message + '</div>');
                } else {
                $('.msgbox').animate({'padding-bottom': '+=10px'}, 200).text(data.message).animate({'padding-bottom': '-=10px'});
                }

                commentBox.fadeIn(0);
                } else {
                $('.msgbox').remove();
                commentBox.remove();

                if ($('.MSG.intern').length < 1) {
                $('.content.comments').append('<div class="error msgbox">Aucun commentaire pour le moment, sois le premier à commenter !</div>');
                }
                }
                }, 'json');

                return false;
                });

               

     });