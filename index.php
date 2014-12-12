<?php
//пора переделывать под mvc...
    session_start();
    
    if(!isset($lang)) $lang='ru';
?>
<html>
    <head>
<?php
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=ru/index.php">';
    require ("$lang/index/servicetag_title.html");
?>
    </head>
    <body>
        <br>
        <br>
        <center>
            

        </center>
    </body>
</html>