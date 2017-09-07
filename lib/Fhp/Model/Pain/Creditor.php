<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 13:15
 */

namespace Fhp\Model\Pain;


class Creditor
{
    /**
     * Wrapped in <Cdtr>
     * Tag: Nm
     *
     * @var string
     */
    private $name;

    /**
     * Wrapped in <CdtrAcct><Id>
     * Tag: IBAN
     *
     * @var string
     */
    private $iban;

    /**
     * Wrapped in <CdtrAgt><FinInstnId>
     * Tag: BIC
     *
     * @var string
     */
    private $bic;

    /**
     * Creditor constructor.
     * @param string $name
     * @param string $iban
     * @param string $bic
     */
    public function __construct($name, $iban, $bic)
    {
        $this->name = $name;
        $this->iban = $iban;
        $this->bic = $bic;
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
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
    }
}