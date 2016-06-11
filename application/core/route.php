<?php

class Route
{
    static function start()
    {
        $log = new __log();
        $log->setRequest();
        $controller_name = 'Home';
        $action_name = 'index';
        $params = array();
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if ($routes[1] == 'ref') {
            $params[0] = isset($routes[2]) ? $routes[2] : '';
        } else {
            if (!empty($routes[1])) {
                $controller_name = $routes[1];
            }
            if (!empty($routes[2])) {
                $action_name = $routes[2];
            }
            if (!empty($routes[3])) {
                for ($i = 3; $i < count($routes); $i++) {
                    $params[] = $routes[$i];
                }
            }
        }
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;

        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;

        // Вызов контроллера и генерация 404 страницы
        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;
            $controller = new $controller_name;
            if (method_exists($controller, $action_name)) {
                $controller->$action_name($params);
            } else {
                Route::ErrorPage404();
            }
        } else {
            Route::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
        include "application/controllers/controller_404.php";
        $controller = new controller_404;
        $controller->action_index();
    }

}
