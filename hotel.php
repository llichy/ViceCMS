<?php 
include 'global.php'; 

    if (!$user->isOnline()) {
        $system->redirect('index');
    } else {
    $accountid = $user->get('id');
    $sso = $system->UpdateSSO($accountid);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

<head>
    <title>ViceHabbo - Hôtel</title>
    <link rel="icon" href="https://vicehabbo.fr/app/assets/img/hvfavicon.png" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store" />
    <meta name="google" content="notranslate" />

    <style type="text/css">
        
    </style>


</head>




<body style="margin:0px;padding:0px;overflow:hidden">
<a href="https://vicehabbo.fr/me"><img src="https://nitro.vicehabbo.fr/assets/img/icon_backtoweb.png" style="position: absolute;width:50px;height: 50px;left: 15px; top:10px;z-index: 999;cursor:pointer"></a>

<img src="https://cdn.discordapp.com/attachments/1065293604110729230/1096081033969008650/icon_fullscreen.png" style="position: absolute;width: 50px;height: 50px;left: 68px;top: 10px;z-index: 999;cursor:pointer" onclick="toggleFullscreen()">


    <iframe src="https://nitro.vicehabbo.fr/index.html?sso=<?= $sso; ?>" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>




<script>
    function toggleFullscreen() {
        if (document.fullscreenElement) {
            document.exitFullscreen();

            return;
        }

        document.documentElement.requestFullscreen();
    }
</script>



</body>

</html>

<?php 
}
?>