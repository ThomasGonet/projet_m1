<?php

use Phalcon\Tag;

class ConnectController extends ControllerBase
{

    public function initialize()
    {
        Tag::setTitle('Connexion');
        parent::initialize();
    }

    public function indexAction()
    {

    }

    private function _registerSession($user)
    {
        $this->session->set('auth', array(
            'id_user' => $user->id_user,
            'name' => $user->login
        ));
    }

    public function startAction()
    {
        if ($this->request->isPost()) {

            //Receiving the variables sent by POST
            $login = $this->request->getPost('login');
            $password = $this->request->getPost('password');

            //$password = sha1($password);

            //Find the user in the database
            $user = User::findFirst(array(
                "login = :login: AND password = :password:",
                "bind" => array('login' => $login, 'password' => $password)
            ));
            if ($user != false) {

                $this->_registerSession($user);

                $this->flash->success('Welcome ' . $user->login);

                //Forward to the 'game' controller if the user is valid
                return $this->dispatcher->forward(array(
                    'controller' => 'game',
                    'action' => 'index'
                ));
            }

            $this->flash->error('Wrong login/password');
        }

        //Forward to the login form again
        return $this->dispatcher->forward(array(
            'controller' => 'connect',
            'action' => 'index'
        ));

    }

    public function endAction() {
        $this->session->remove('auth');

        $this->flash->warning('Vous avez bien été déconnecté');

        return $this->dispatcher->forward(array(
            'controller' => 'index',
            'action' => 'index'
        ));
    }

}

