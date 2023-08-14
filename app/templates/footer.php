<div class="palierload" id="settings16" style="transform: scale(0); transition: 0.2s; display: none;">
   <div onclick="ClosePalier()" id="fermeture"></div>
</div>

<script type="text/javascript">
        var siteUrl = "<?= URL ?>";

        const link = '<?= URL ?>'
        const views = link + 'app/views/'
        const actions = link + 'app/actions/'
        const api = link + 'app/api/'
        const sitename = '<?= sitename ?>'
        const avatar = '<?= AVATAR ?>'
    </script>

<?php if ($_GET['page'] == 'me' || $_GET['page'] == 'community' || $_GET['page'] == 'palmares') { ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="<?= ASSETSURL; ?>js/w2ui-1.4.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= ASSETSURL; ?>css/w2ui-1.4.2.min.css?v=<?= time() ?>" />
<script type="text/javascript" src="<?= ASSETSURL ?>js/jquery.me.js?<?= time() ?>" charset="utf-8"></script>
<?php } ?>

    <script type="text/javascript" src="<?= ASSETSURL ?>js/jquery.min.js?<?php echo time() ?>"></script>
    <script src="<?= ASSETSURL; ?>js/jquery.extend.js" charset="utf-8"></script>
    <?php     
        if ((defined('JS')) && (file_exists(ASSETSDIR . 'js/jquery.' . JS . '.js'))) {
            ?>
  <script type="text/javascript" src="<?= ASSETSURL; ?>js/jquery.<?= JS; ?>.js?<?= time() ?>" charset="utf-8"></script>
            <?php
        }   
        ?>





<div class="footer">
  <div class="footerposition">
    <div class="footerlogo">
      <img src="<?= ASSETSURL; ?>img/footerlog.png">
    </div>
    <div class="footerpositioncopyright">
      <div class="footercopyright">
      <span><b style="color:#8e56ab">Vice</b>Cms by</span> <b style="color:#8e56ab">Stown</b><br>
      <span>All rights reserved by HabboVice</span><br>
      <span>This website is not owned or operated by Sulake Oy and is not part of Habbo Hotel.</span>
    </div>
    </div>
  </div>
</div>


</body>
</html>