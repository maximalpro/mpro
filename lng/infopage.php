<?php
    session_start();

    if(!isset($lang)) $lang='ru';
    if(!isset($infopage))
    {
        include('err.php');
        die();
    }
?>
<html>
    <head>
<?php
    require ("./../$lang/index/servicetag_title.html");
    require ("./../$lang/index/servicetag_head.php");
?>
    </head>
    <body>

<?php require ("./../$lang/index/headmenu.html"); ?>
        
        <center>
            <table id="mainpage" cellpadding="0" cellspacing="4">
                <tr>
                    <td class="pagetextarea">
<?php require ("./../$lang/$infopage/text.html"); ?>
                    </td>
                </tr>
                <tr>
                    <td id="footer" colspan="3">
<?php require ("./../$lang/index/footer.html"); ?>
                    </td>
                </tr>
        </center>
    </body>
</html>