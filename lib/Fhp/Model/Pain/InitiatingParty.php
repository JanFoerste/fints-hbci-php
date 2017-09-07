<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 11:21
 */

namespace Fhp\Model\Pain;

/**
 * Class InitiatingParty
 * @package Fhp\Model\Pain
 */
class InitiatingParty
{
    const TAG = 'InitgPty';

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string;
     */
    private $issuer;

    /**
     * InitiatingParty constructor.
     * @param string $name
     * @param string $id
     * @param string $issuer
     */
    public function __construct($name, $id = null, $issuer = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->issuer = $issuer;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * @param string $issuer
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    }

}