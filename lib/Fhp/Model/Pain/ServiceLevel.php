<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 12:06
 */

namespace Fhp\Model\Pain;

class ServiceLevel
{
    const TAG = 'SvcLvl';

    /**
     * @var string
     */
    private $code = 'SEPA';

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
}