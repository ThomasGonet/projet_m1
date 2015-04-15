<?php

class AddalertController extends \Phalcon\Mvc\Controller
{


    public function indexAction()
    {
        $this->view->disable();
        $request = new \Phalcon\Http\Request();

        $lat = $request->getPost("latitude") ?: " ";
        $long = $request->getPost("longitude") ?: " ";
        $fName = $request->getPost("firstNameVictim") ?: " ";
        $lName = $request->getPost("lastNameVictim") ?: " ";

        $air = -1;

        if($request->getQuery("latitude") != "")
        {
            $lat = $request->getQuery("latitude");
        }

        if($request->getQuery("longitude") != "")
        {
            $long = $request->getQuery("longitude");
        }

        if($request->getQuery("airquality") != "")
        {
            $air = $request->getQuery("airquality");
        }


        $alert = new Alert();
        $alert->air_quality = $air;
        $alert->latitude = $lat;
        $alert->longitude = $long;
        $alert->firstNameVictim = $fName;
        $alert->lastNameVictim = $lName;
        $datetime = new Datetime();
        $alert->date_releve = $datetime->format('Y-m-d H:i:s');
        $status = $alert->save();
        $response = new Phalcon\Http\Response();
        //Check if the insertion was successful
        if ($status == true) {
            echo "ok";
        }
        else{
            echo "ko";
            $response->setStatusCode(409, "Conflict");

            //Send errors to the client
            $errors = array();
            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(array('status' => 'ERROR', 'messages' => $errors));
        }

    }

}


