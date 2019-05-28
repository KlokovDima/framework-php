<?php

namespace core;

class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $prefix;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta = '')
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if ($layout === false) {
            $layout = false;
        } else {
            $this->layout = $layout ?? LAYOUT;
        }
    }

    public function render($data)
    {
        extract($data);
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if (file_exists($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception("Не найден вид {$viewFile}", 500);
        }

        if ($this->layout !== false) {
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if (file_exists($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Не найден шаблон {$layoutFile}");
            }
        }
    }

    public function getMeta()
    {
        $output = "<title>{$this->meta['title']}</title>" . PHP_EOL;
        $output .= "<meta name='description' content='{$this->meta['title']}'/>" . PHP_EOL;
        $output .= "<meta name='keywords' content='{$this->meta['keywords']}'/>" . PHP_EOL;
        return $output;
    }
}
