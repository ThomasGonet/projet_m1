<?php

use Phalcon\Tag;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        Tag::setTitle('Bienvenue');
        parent::initialize();
    }

    public function indexAction()
    {

    }

}

