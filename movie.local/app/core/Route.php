<?php

namespace app\core;

use JetBrains\PhpStorm\NoReturn;

class Route
{
    /**
     * Initializes request processing based on the URL path.
     *
     * The `init` function analyzes the URL path from `$_SERVER['REQUEST_URI']`, determines the controller and action (method) to execute,
     * and then initiates the call to the corresponding controller and method. If the URL path is too long, the function performs
     * a redirection to a shorter URL.
     *
     * @return void
     */
    static public function init()
    {
        $controllerName = 'index';

        $action = 'index';

        $urlPath = $_SERVER['REQUEST_URI'];

        $urlComponents = explode('/', $urlPath);
        
        array_shift($urlComponents);
        if (count($urlComponents) > 2) {
            $urlComponents = array_splice($urlComponents, 0, 2);
            $redirectUrl = '/' . implode('/', $urlComponents);
            var_dump($redirectUrl);
            self::redirect($redirectUrl);
        }
        if (!empty($urlComponents[0])) {
            $controllerName = strtolower($urlComponents[0]);

        }
        if (!empty($urlComponents[1])) {
            $parts = explode("?", $urlComponents[1]);
            $action = strtolower($parts[0]);

        }
        $controllerClass = "\app\controllers\\" . ucfirst($controllerName . 'Controller');

        if (!class_exists($controllerClass)) {
            Log::info($controllerClass . 'not found');
            self::notFound();
        }
        $controller = new $controllerClass();
        if (!method_exists($controller, $action)) {
            Log::info($controllerClass . 'with action' . $action . 'not found');
            self::notFound();
        }
        self::call($controller, $action);
    }

    /**
     * Performs an HTTP redirect to the specified URL and ends script execution.
     * @param $url
     * @return void
     */
    #[NoReturn] static public function redirect($url): void
    {
        header('Location: ' . $url);
        exit();
    }

    /**
     * Sets the HTTP status code to 404 (Not Found) and terminates the execution of the current script.
     *
     * The notFound function sets the HTTP response status to 404, indicating that the requested resource
     * is not found on the server. After setting the HTTP status to 404, the function calls exit() to immediately
     * terminate the execution of the current PHP script, preventing further code execution. This is used to
     * inform the client (e.g., the browser) that the requested page does not exist.
     *
     * @return void
     */
    #[NoReturn] static public function notFound(): void
    {
        http_response_code(404);
        exit();
    }

    /**
     * Calls a controller method.
     *
     * The `call` function is used to invoke a method (action) of the controller provided as an argument, using the specified method (action) name.
     * It takes a controller object `$controller` and a string `$action`, representing the name of the method (action) to be called in the controller.
     *
     * @param controllerable $controller The controller object on which the method (action) is called.
     * @param string $action The name of the method (action) to be called.
     * @return void
     */
    static private function call(controllerable $controller, string $action)
    {
        $controller->$action();
    }
}

