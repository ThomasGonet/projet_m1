<?php

class Alert extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idSos;

    /**
     *
     * @var string
     */
    public $latitude;

    /**
     *
     * @var string
     */
    public $longitude;

    /**
     *
     * @var string
     */
    public $firstNameVictim;

    /**
     *
     * @var string
     */
    public $lastNameVictim;

    /**
     *
     * @var integer
     */
    public $air_quality;

    /**
     *
     * @var string
     */
    public $date_releve;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource('alert');
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'idSos' => 'idSos', 
            'latitude' => 'latitude', 
            'longitude' => 'longitude', 
            'firstNameVictim' => 'firstNameVictim', 
            'lastNameVictim' => 'lastNameVictim', 
            'air_quality' => 'air_quality', 
            'date_releve' => 'date_releve'
        );
    }

}
