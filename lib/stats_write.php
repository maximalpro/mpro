<?php

//открываем файл
    $fp = fopen('lib/stats.txt', 'a');

//пишем в него нужны данные
    fwrite($fp, 
               "\r\n".
               $_COOKIE['myvisits']."\t".
               $_SESSION['stat']."\t".
               (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'none')."\t".
               $_SERVER['REQUEST_TIME']."\t".
               $_SERVER['HTTP_ACCEPT_LANGUAGE']."\t".
               $_SERVER['REMOTE_ADDR']."\t".
               $_SERVER['REQUEST_URI']
           );

//закрываем
    fclose($fp);
    
//в сессии добавляем колличество просмотренных страниц
    $_SESSION['stat']++;
    
?>