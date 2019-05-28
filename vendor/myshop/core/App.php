<?php

namespace core;

class App
{

    public static $app;

    function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        self::$app = Registry::getInstance();
        $this->getParams();
        new ErrorHandler();
        Router::dispatch($query);
    }

    protected function getParams()
    {
        $params = require_once CONFIG . '/params.php';
        if ($params) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}
