<?php

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var string
     */
    public $login;

    /**
     *
     * @var integer
     */
    public $password;

    /**
     *
     * @var string
     */
    public $mail;

    /**
     *
     * @var string
     */
    public $birth_date;

    /**
     *
     * @var string
     */
    public $register_date;

    /**
     *
     * @var integer
     */
    public $city;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource('user');
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id_user' => 'id_user', 
            'login' => 'login', 
            'password' => 'password', 
            'mail' => 'mail', 
            'birth_date' => 'birth_date', 
            'register_date' => 'register_date', 
            'city' => 'city'
        );
    }

}
