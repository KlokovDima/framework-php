<?php

namespace app\controllers;

class MainController extends AppController
{

    public function indexAction()
    {
        $this->setMeta('Home title', 'Home description', 'Home keywords');

        $name = 'Ivan';
        $age = 30;
        $arr = ['lastname' => 'Ivanov', 'firstname' => 'Vladimir'];

        $this->set(compact('name', 'age', 'arr'));
    }
}
