<?php

namespace core;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayErrors('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл {$file} | Строка: {$line}\n==================\n", 3, ROOT . '/tmp/errors.log');
    }

    protected  function  displayErrors($errno, $errstr, $errfile, $errline, $responce = '404')
    {
        if ($responce == 404 && !DEBUG) {
            require WEB . '/errors/404.php';
            die;
        }
        if (DEBUG) {
            require WEB . '/errors/dev.php';
        } else {
            require WEB . '/errors/prod.php';
        }
    }
}
