
function PageClose() {
    $("html").css({ overflow: "auto" }), $("#b41").hide(), $("#b42").hide(), $("#b43").hide(), $("#shopload").hide(), $("#b65").animate({ top: "-100px" }, 0);
}
function LoaderEnd(o) {
    ($shop = $("#b42")),
        $("#b41").fadeOut(500),
        "x" != o && ($("#b43").html(o), $("#b43").show()),
        "x" == o && $shop.hide(),
        $("#shopload").show(),
        $($shop).css({ top: "90px", left: "15%" }),
        $($shop).css({ transform: "scale(1.0)", transition: "0.4s" });
}

	function LoaderStart() {
    ($shop = $("#b42")), $("#b41").show(), $("#b43").hide(), $($shop).css({ top: "40%", left: "calc(50% - 32px)" }).show();
}

	function ShopLoad(o, a) {
    $("html");
        $("html").css({ overflow: "hidden" }),
        LoaderStart(),
        $("#shopload").load(a, function (a, c, e) {
            "success" == c ? (LoaderEnd(o), "x" != o) : alert("Erreur")
        });
}


    $(document).on('submit', 'form[name="vip"]', function () {
        var tthis = $(this),
            token = $('> input[name="token"]', tthis).val(),
            submit = $('> input.buttondex', tthis),
            submitVal = submit.val(),
            errorBloc = $('.errorshop');


        errorBloc.text('').fadeOut(0);
        submit.val('Chargement en cours...').attr("disabled", true);

        $.post(tthis.attr('action'), {token : token }, function (data) {
            submit.val(submitVal).attr('disabled', false);

            if (data.type == 'error') {
                errorBloc.text(data.message).fadeIn(0).removeClass('success');
            } else {
                errorBloc.text(data.message).fadeIn(0).addClass('success');
            }
        }, 'json');

        return false;
    });

        $(document).on('submit', 'form[name="buyBadge"]', function () {
        var tthis = $(this),
            prix = $('> input[name="prix"]', tthis).val(),
            code = $('> input[name="code"]', tthis).val(),
            token = $('> input[name="token"]', tthis).val(),
            errorBloc = $('.errorshop'),
            submit = $('> input[type="submit"]', tthis),
            submitVal = submit.val();

        errorBloc.text('').fadeOut(0);
        submit.val('Chargement en cours...').attr("disabled", true);

        $.post(tthis.attr('action'), { prix : prix, code : code, token : token }, function (data) {
            submit.val(submitVal).attr('disabled', false);

            if (data.type == 'error') {
                errorBloc.text(data.message).fadeIn(0).removeClass('success');
            } else {
                errorBloc.text(data.message).fadeIn(0).addClass('success');
                jetonsMoins(data.prix);
                $('.badge[badgeid="' + code + '"]').remove();
            }
        }, 'json');

        return false;
    });


            $(document).on('click', '#xp', function () {
        var xp =  $(this).attr("xpp"),
            token = $(this).attr("token"),
            errorBloc = $('.errorshop'),
            submit = $(this),
            submitVal = $(this).text();
        
        $(this).html('Chargement en cours...');

        $.post(actions + 'shop_xp.php', { xp : xp, token : token }, function (data) {
           submit.html(submitVal);

            if (data.type == 'error') {
                errorBloc.text(data.message).fadeIn(0).removeClass('success');
            } else {
                errorBloc.text(data.message).fadeIn(0).addClass('success');
            }
        }, 'json');

        return false;
    });

                        $(document).on('click', '#coffre', function () {
        var coffre =  $(this).attr("coffre"),
            token = $(this).attr("token"),
            errorBloc = $('.errorshop'),
            submit = $(this),
            submitVal = $(this).text();
        
        $(this).html('Chargement en cours...');

        $.post(actions + 'shop_coffre.php', { coffre : coffre, token : token }, function (data) {
           submit.html(submitVal);

            if (data.type == 'error') {
                errorBloc.text(data.message).fadeIn(0).removeClass('success');
            } else {
                errorBloc.text(data.message).fadeIn(0).addClass('success');
            }
        }, 'json');

        return false;
    });

                            $(document).on('click', '#diams', function () {
        var diams =  $(this).attr("diams"),
            token = $(this).attr("token"),
            errorBloc = $('.errorshop'),
            submit = $(this),
            submitVal = $(this).text();
        
        $(this).html('Chargement en cours...');

        $.post(actions + 'shop_diams.php', { diams : diams, token : token }, function (data) {
           submit.html(submitVal);

            if (data.type == 'error') {
                errorBloc.text(data.message).fadeIn(0).removeClass('success');
            } else {
                errorBloc.text(data.message).fadeIn(0).addClass('success');
            }
        }, 'json');

        return false;
    });


