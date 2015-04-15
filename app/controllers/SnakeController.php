<?php

use Phalcon\tag;

class SnakeController extends ControllerBase
{
    public function initialize()
    {
        Tag::setTitle('Snake');
        parent::initialize();
    }

    public function indexAction()
    {

    }

}

