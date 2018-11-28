<?php
//FRONT CONTROLLER

// 1) Общие навтройки
ini_set('display_errors',1);
error_reporting(E_ALL);

// 2)Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/SourceFiles/Components/Router.php');



// 3) Установка соединения с БД

// 4) Вызов Router
$router = new Router();
$router->run();
?>
