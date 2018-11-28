<?php

class Router {

    private  $routes;

    public function __construct() {
        $rotesPath = ROOT. '/SourceFiles/Config/Routes.php';
        $this->routes =include($rotesPath);
    }
    //Returns rquest string
    private  function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        echo $uri;
    }


    public  function  run () {

        // Получить строку запроса
        /*if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
        }*/
        $uri = $this->getURI();
        echo $uri;

        // Проверить наличие такого запроса в Routes.php
        foreach ($this->routes as $uriPattern => $path) {
            echo "<br>$uriPattern -> $path";

        // Сравниваем строку запроса $uriPattern и данные $uri
            if (preg_match("~$uriPattern~", $uri)) {
                echo $path;

                // Если есть совпадение, определить в какой метод
                // и action обрабатывают запрос

                $segments = explode('/', $path);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst (array_shift($segments)).'Controller';

                echo $actionName;

                // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/'.
                    $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);

                    //Cоздать объект, вызвать метод (action)
                    $controllerObject = new $controllerName;
                    $result = $controllerObject->actionName ();
                    if ($result != null) {
                        break;
                    }
                }
            }

        }




    }
}
?>