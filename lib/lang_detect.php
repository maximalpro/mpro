<?php
    //проверяем не передал ли пользователь нам свой язык
    if(isset($_GET['lang'])) 
    {
        $lang=$_GET['lang'];
        $_SESSION['lang']=$lang;
    }
    //если не передал проверяем может он уже указан в сессии
    elseif(isset($_SESSION['lang'])) 
    {
        $lang=$_SESSION['lang'];
    }
    //если и в сессии нет
    else
    {
        //проверяем может язык есть в куке
        if(isset($_COOKIE['mylang'])) 
        {
            $lang=$_COOKIE['mylang'];
        }
        //нету в куке тогда смотрим браузер
        else
        {
            //ищем любой вариант намёка на русский
            if(
                stripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'ru') !==false || 
                stripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'rus') !==false || 
                stripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'russian') !==false
               )
            {
                $lang='ru';
            }
            //не нашли намёка на русский? тогда ставим английский
            else
            {
                $lang='en';
            }
            //так как знаем что кука не стоит - пишем на будущее
            setcookie("mylang", $lang, mktime(1, 2, 3, 4, 5, 2020));
        }
        
        //устанавливаем язык в сессии
        $_SESSION['lang']=$lang;
    }
?>