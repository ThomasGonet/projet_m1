<?php

use Phalcon\Tag;

class ContactController extends ControllerBase
{
    public function initialize()
    {
        Tag::setTitle('Contact');
        parent::initialize();
    }

    public function indexAction()
    {

    }

}

