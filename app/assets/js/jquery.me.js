$(document).ready(function() {

  $(".photoimage").on('click', function() {
    w2popup.open({
      body: '<div class="w2ui-centered"><img src="' + $(this).attr('src') + '"></img></div>'
    });
  });

});


  function PalierLoad() {
    var a = $(".palierload");
    a.css({transform: "scale(0.5)", transition: "0.2s"});
    $(".palierloader").show();
    a.load(actions + "palier.php", function (responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
                $("html").css({
        "overflow": "auto"
    });
            a.show();
            $(".palierloader").fadeOut(500);
            a.css({transform: "scale(1)", transition: "0.4s"});
        }
    });
}

function ClosePalier() {
    $(".palierload").css({transform: "scale(0.0)", transition: "0.2s"}).fadeOut(400);

}

function GetPalier() {
    $(".submit").html("Chargement...");
    var o = $("#sonid").val();
    var t = $("#token").val();
    $.ajax({
        type: "POST",
        url: "app/actions/getpalier.php",
        data: {
            n: o,
            c: t ,
            type: "hidden"
        },
        dataType: "json",
        success: function(json) {

            if (json.reponse == 'erreur') {
               $(".error").html(json.message);
            } else {
               $(".success").html(json.message);
            }

      /*  if (json.reponse = "ok") {
         $(".recu").css({display: "block"});
           } else {
              $(".error").html(json.message);
            }*/
           

        }
    })
}

function CloseRecPalier() {
    $(".palierrecompenseload").css({transform: "scale(0.0)", transition: "0.2s"}).fadeOut(400);
    $("html").css({overflow: "auto"});

}