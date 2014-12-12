<?php

class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        
        $local_rewrite=preg_replace("/^.*\/cab\//", '/', $_SERVER['REQUEST_URI']);
        $routes = explode('/', $local_rewrite);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {	
            $controller_name = $routes[1];
        }
        
        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "lib/application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "lib/application/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "lib/application/controllers/".$controller_file;
//        echo $controller_path;
        if(file_exists($controller_path))
        {
            include "lib/application/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }
        
        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;
        
        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }
    
    }
    
    function ErrorPage404()
    {
/*        $host = 'http://maximal.pro/ru/err.php?404';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location: http://maximal.pro/ru/err.php?404');
*/    }
}

?>