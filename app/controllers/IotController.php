<?php

use Phalcon\Tag;

class IotController extends ControllerBase
{
    public function initialize()
    {
        Tag::setTitle('Projet IOT');
        parent::initialize();
    }


    public function indexAction()
    {
        $phql = "SELECT * FROM Alert ORDER BY idSos DESC ";
        $alerts = $this->modelsManager->executeQuery($phql);
        $this->view->setVar("alerts", $alerts);

    }

    /**
     *
     */
    public function alertidAction()
    {
        $idSos = $this->dispatcher->getParams();

        $phql = "SELECT idSos, latitude, longitude, firstNameVictim, lastNameVictim FROM Alert  WHERE idSos = :id:";
        $alerts = $this->modelsManager->executeQuery($phql, array(
            'id' => $idSos[0]
        ))->getFirst();
        $this->view->setVar("alerts", $alerts);
    }

}

