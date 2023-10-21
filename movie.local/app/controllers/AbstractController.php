<?php

namespace app\controllers;

use app\core\controllerable;
use app\core\View;


abstract class AbstractController implements Controllerable
{
    /**
     * @var View
     * create variable $view
     */
    protected View $view;
    protected $model;

    /**
     * Set object View into $view;
     */
    public function __construct()
    {
        $this->view = new View();
    }
}