<?php
    //проверяем не хочет ли пользователь посмотретьстатистику
    if(isset($_GET['showmethestats']))
    {
        //хочет? показываем её
        readfile('lib/stats.txt');
        die();
    }

    //проверяем есть ли в данной сессис перемнная с кол-вом просмотров?
    if(!isset($_SESSION['stat'])) 
    {
        //устанваливаем счётчик в 0
        $_SESSION['stat']=0;

        //проверяем установлена ли кука, т.е. не вернулся ли наш пользователь к нам
        if(isset($_COOKIE['myvisits']))
        {
            //установлена - тогда указываем сколько раз он к нам вернулся (+1)
            setcookie("myvisits", (intval($_COOKIE['myvisits'])+1), mktime(1, 2, 3, 4, 5, 2020));
        }
        else
        {
            //новый человек? тогда ставим куку в 0
            $_COOKIE['myvisits']=0;
            setcookie("myvisits", 0, mktime(1, 2, 3, 4, 5, 2020));
        }
    }
?>