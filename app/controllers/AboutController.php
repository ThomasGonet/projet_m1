<?php

use Phalcon\Tag;

class AboutController extends ControllerBase
{
    public function initialize()
    {
        Tag::setTitle('A propos');
        parent::initialize();
    }

    public function indexAction()
    {

    }

}

