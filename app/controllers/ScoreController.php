<?php

use Phalcon\Tag;

class ScoreController extends ControllerBase
{
    public function initialize()
    {
        Tag::setTitle('Score');
        parent::initialize();
    }


    public function indexAction()
    {

    }

}

