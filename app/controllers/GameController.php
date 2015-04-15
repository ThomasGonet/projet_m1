<?php

use Phalcon\Tag;

class GameController extends ControllerBase
{
    public function initialize()
    {
        Tag::setTitle('Liste de jeux');
        parent::initialize();
    }

    public function indexAction()
    {

    }

}

