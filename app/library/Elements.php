<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component
{

    private $_headerMenu = array(
        'navbar-left' => array(
            'index' => array(
                'caption' => 'Accueil',
                'action' => 'index'
            ),
            'game' => array(
                'caption' => 'Jeux',
                'action' => 'index'
            ),
            'score' => array(
                'caption' => 'Scores',
                'action' => 'index'
            ),
            'iot' => array(
                'caption' => 'Projet IOT',
                'action' => 'index'
            ),
            'contact' => array(
                'caption' => 'Contact',
                'action' => 'index'
            ),
            'about' => array(
                'caption' => 'A propos',
                'action' => 'index'
            ),
        ),
        'navbar-right' => array(
            'connect' => array(
                'caption' => 'Log In/Sign Up',
                'action' => 'index'
            ),
        )
    );

    private $_tabs = array(
        'Jeux' => array(
            'controller' => 'game',
            'action' => 'index',
            'any' => false
        ),
        'Snake' => array(
            'controller' => 'snake',
            'action' => 'index',
            'any' => true
        ),
        'Tetris' => array(
            'controller' => 'tetris',
            'action' => 'index',
            'any' => true
        )
    );

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {
        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['navbar-right']['connect'] = array(
                'caption' => 'Log Out',
                'action' => 'end'
            );
        } else {
            unset($this->_headerMenu['navbar-left']['game']);
            unset($this->_headerMenu['navbar-left']['score']);
            unset($this->_headerMenu['navbar-left']['iot']);
        }

        $controllerName = $this->view->getControllerName();
        echo '<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">';
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="nav-link active">';
                } else {
                    echo '<li>';
                }
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</div>';


    }

    /**
     * Returns menu tabs
     */
    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '<li>';
        }
        echo '</ul>';
    }
}