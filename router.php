<?php

require $_SERVER['DOCUMENT_ROOT'] . "/apiJokes/config/config.php";

class Route
{

    public $routes = [];

    /**
     * @param route the route url
     * @param file the view file to be served
     */
    public function Add($route, $file)
    {
        $this->routes[$route] = ['file' => $file];
    }

    public function Dispatch()
    {
        $parsed_url = parse_url($_SERVER['REQUEST_URI']); //Parse Uri
        $request = str_replace(PROJECT_FOLDER, "", $parsed_url['path']);

        // if found require
        if ($this->routes[$request]) {
            http_response_code(200);
            require VIEW . $this->routes[$request]['file'];
        } else {
            http_response_code(404);
            require VIEW . '404.html';
        }
    }
}
