<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 12:01
 */

namespace Fhp\Model\Pain;


class PaymentTypeInformation
{
    const TAG = 'PmtTpInf';

    /**
     * @var null|string
     */
    private $instructionPriority;

    /**
     * @var ServiceLevel
     */
    private $serviceLevel;

    /**
     * PaymentTypeInformation constructor.
     * @param string $instructionPriority
     * @param ServiceLevel $serviceLevel
     */
    public function __construct($instructionPriority = null, ServiceLevel $serviceLevel = null)
    {
        $this->instructionPriority = $instructionPriority;

        if ($serviceLevel) {
            $this->serviceLevel = $serviceLevel;
        } else {
            $this->serviceLevel = new ServiceLevel();
        }
    }

    /**
     * @return string
     */
    public function getInstructionPriority()
    {
        return $this->instructionPriority;
    }

    /**
     * @param string $instructionPriority
     */
    public function setInstructionPriority($instructionPriority)
    {
        $this->instructionPriority = $instructionPriority;
    }

    /**
     * @return ServiceLevel
     */
    public function getServiceLevel()
    {
        return $this->serviceLevel;
    }

    /**
     * @param ServiceLevel $serviceLevel
     */
    public function setServiceLevel(ServiceLevel $serviceLevel)
    {
        $this->serviceLevel = $serviceLevel;
    }

}