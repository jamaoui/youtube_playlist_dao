<?php

namespace app\Controllers;

class BaseController
{
    protected static $model;

    public static function view($view, $data = NULL)
    {
        require "resources/views/" . $view . ".php";
    }

    public static function redirect($route)
    {
        header("location: index.php?action=$route");
    }
}