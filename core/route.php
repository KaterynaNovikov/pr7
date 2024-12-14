<?php
class Route {
    public static function start() {
        $controllerName = DEFAULT_CONTROLLER; 
        $actionName = DEFAULT_ACTION;

        $uri = str_replace('/index.php', '', $_SERVER['REQUEST_URI']);
        $routes = explode('/', trim($uri, '/'));

        if (!empty($routes[0])) {
            $controllerName = $routes[0];
        }

        if (!empty($routes[1])) {
            $actionName = $routes[1];
        }

        $controllerFile = 'controllers/' . ucfirst($controllerName) . 'Controller.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
        } else {
            die('Контроллер не найден!');
        }

        $controllerClass = ucfirst($controllerName) . 'Controller';
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
        } else {
            die('Класс контроллера не найден!');
        }

        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            die('Метод не найден!');
        }
    }
}
?>
