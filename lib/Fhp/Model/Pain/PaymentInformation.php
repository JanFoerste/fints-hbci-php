<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 11:44
 */

namespace Fhp\Model\Pain;

class PaymentInformation
{
    const TAG = 'PmtInf';

    /**
     * Tag: PmtInfId
     *
     * @var string
     */
    private $paymentInformationId;

    /**
     * Tag: PmtMtd
     *
     * @var string
     */
    private $paymentMethod = 'TRF';

    /**
     * Tag: NbOfTxs
     *
     * @var int
     */
    private $numberOfTransactions;

    /**
     * Tag: CtrlSum
     *
     * @var float
     */
    private $controlSum;

    /**
     * Tag: PmtTpInf
     *
     * @var PaymentTypeInformation
     */
    private $paymentTypeInformation;

    /**
     * Format: YYYY-MM-DD
     * Tag: ReqdExctnDt
     *
     * @var string
     */
    private $requestedExecutionDate;

    /**
     * @var Debtor
     */
    private $debtor;

    /**
     * Tag: ChrgBr
     *
     * @var string
     */
    private $chargeBearer = 'SLEV';

    /**
     * Tag: CdtTrfTxInf
     *
     * @var CreditTransferTransactionInformation
     */
    private $creditTransferTransactionInformation;

    /**
     * PaymentInformation constructor.
     * @param string $paymentInformationId
     * @param int $numberOfTransactions
     * @param float $controlSum
     * @param PaymentTypeInformation $paymentTypeInformation
     * @param string $requestedExecutionDate
     * @param Debtor $debtor
     * @param CreditTransferTransactionInformation $creditTransferTransactionInformation
     */
    public function __construct($paymentInformationId, $numberOfTransactions, $controlSum, PaymentTypeInformation $paymentTypeInformation, $requestedExecutionDate = '1999-01-01', Debtor $debtor, CreditTransferTransactionInformation $creditTransferTransactionInformation)
    {
        $this->paymentInformationId = $paymentInformationId;
        $this->numberOfTransactions = $numberOfTransactions;
        $this->controlSum = $controlSum;
        $this->paymentTypeInformation = $paymentTypeInformation;
        $this->requestedExecutionDate = $requestedExecutionDate;
        $this->debtor = $debtor;
        $this->creditTransferTransactionInformation = $creditTransferTransactionInformation;
    }

    /**
     * @return string
     */
    public function getPaymentInformationId()
    {
        return $this->paymentInformationId;
    }

    /**
     * @param string $paymentInformationId
     */
    public function setPaymentInformationId($paymentInformationId)
    {
        $this->paymentInformationId = $paymentInformationId;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return int
     */
    public function getNumberOfTransactions()
    {
        return $this->numberOfTransactions;
    }

    /**
     * @param int $numberOfTransactions
     */
    public function setNumberOfTransactions($numberOfTransactions)
    {
        $this->numberOfTransactions = $numberOfTransactions;
    }

    /**
     * @return float
     */
    public function getControlSum()
    {
        return round($this->controlSum, 2, PHP_ROUND_HALF_DOWN);
    }

    /**
     * @param float $controlSum
     */
    public function setControlSum($controlSum)
    {
        $this->controlSum = $controlSum;
    }

    /**
     * @return PaymentTypeInformation
     */
    public function getPaymentTypeInformation()
    {
        return $this->paymentTypeInformation;
    }

    /**
     * @param PaymentTypeInformation $paymentTypeInformation
     */
    public function setPaymentTypeInformation($paymentTypeInformation)
    {
        $this->paymentTypeInformation = $paymentTypeInformation;
    }

    /**
     * @return string
     */
    public function getRequestedExecutionDate()
    {
        return $this->requestedExecutionDate;
    }

    /**
     * @param string $requestedExecutionDate
     */
    public function setRequestedExecutionDate($requestedExecutionDate)
    {
        $this->requestedExecutionDate = $requestedExecutionDate;
    }

    /**
     * @return Debtor
     */
    public function getDebtor()
    {
        return $this->debtor;
    }

    /**
     * @param Debtor $debtor
     */
    public function setDebtor($debtor)
    {
        $this->debtor = $debtor;
    }

    /**
     * @return string
     */
    public function getChargeBearer()
    {
        return $this->chargeBearer;
    }

    /**
     * @param string $chargeBearer
     */
    public function setChargeBearer($chargeBearer)
    {
        $this->chargeBearer = $chargeBearer;
    }

    /**
     * @return CreditTransferTransactionInformation
     */
    public function getCreditTransferTransactionInformation()
    {
        return $this->creditTransferTransactionInformation;
    }

    /**
     * @param CreditTransferTransactionInformation $creditTransferTransactionInformation
     */
    public function setCreditTransferTransactionInformation($creditTransferTransactionInformation)
    {
        $this->creditTransferTransactionInformation = $creditTransferTransactionInformation;
    }
}