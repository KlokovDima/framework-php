<?php

namespace core;

class Db
{
    use TSingleton;

    protected function __construct()
    {
        $db = require_once CONFIG . 'db.php';
    }
}
