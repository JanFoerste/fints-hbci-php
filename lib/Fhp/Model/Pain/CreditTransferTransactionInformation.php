<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 12:33
 */

namespace Fhp\Model\Pain;


class CreditTransferTransactionInformation
{
    const TAG = 'CdtTrfTxInf';

    /**
     * Wrapped in <PmtId>
     * Tag: EndToEndId
     *
     * @var string
     */
    private $endToEndId;

    /**
     * @var string
     */
    private $currency;

    /**
     * Wrapped in <Amt>
     * Tag: InstdAmt Ccy="$this->currency"
     *
     * @var float
     */
    private $instructedAmount;

    /**
     * @var Creditor
     */
    private $creditor;

    /**
     * Wrapped in <RmtInf>
     * Tag: Ustrd
     *
     * @var string
     */
    private $unstructured;

    /**
     * CreditTransferTransactionInformation constructor.
     * @param string $endToEndId
     * @param string $currency
     * @param float $instructedAmount
     * @param Creditor $creditor
     * @param string $unstructured
     */
    public function __construct($endToEndId, $currency, $instructedAmount, Creditor $creditor, $unstructured)
    {
        $this->endToEndId = $endToEndId;
        $this->currency = $currency;
        $this->instructedAmount = $instructedAmount;
        $this->creditor = $creditor;
        $this->unstructured = $unstructured;
    }

    /**
     * @return string
     */
    public function getEndToEndId()
    {
        return $this->endToEndId;
    }

    /**
     * @param string $endToEndId
     */
    public function setEndToEndId($endToEndId)
    {
        $this->endToEndId = $endToEndId;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getInstructedAmount()
    {
        return number_format($this->instructedAmount, 2);
    }

    /**
     * @param float $instructedAmount
     */
    public function setInstructedAmount($instructedAmount)
    {
        $this->instructedAmount = $instructedAmount;
    }

    /**
     * @return Creditor
     */
    public function getCreditor()
    {
        return $this->creditor;
    }

    /**
     * @param Creditor $creditor
     */
    public function setCreditor($creditor)
    {
        $this->creditor = $creditor;
    }

    /**
     * @return string
     */
    public function getUnstructured()
    {
        return $this->unstructured;
    }

    /**
     * @param string $unstructured
     */
    public function setUnstructured($unstructured)
    {
        $this->unstructured = $unstructured;
    }
}