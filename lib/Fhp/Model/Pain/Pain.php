<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 11:12
 */

namespace Fhp\Model\Pain;

use Fhp\Model\Pain\GroupHeader;
use Fhp\Model\Pain\PaymentInformation;

class Pain
{
    const ROOT_TAG = 'CstmrCdtTrfInitn';

    /**
     * Tag: GrpHdr
     *
     * @var GroupHeader
     */
    private $groupHeader;

    /**
     * Tag: PmtInf
     *
     * @var PaymentInformation
     */
    private $paymentInformation;

    /**
     * Pain constructor.
     * @param GroupHeader $groupHeader
     * @param PaymentInformation $paymentInformation
     */
    public function __construct(GroupHeader $groupHeader, PaymentInformation $paymentInformation)
    {
        $this->groupHeader = $groupHeader;
        $this->paymentInformation = $paymentInformation;
    }

    /**
     * @return GroupHeader
     */
    public function getGroupHeader()
    {
        return $this->groupHeader;
    }

    /**
     * @param GroupHeader $groupHeader
     */
    public function setGroupHeader($groupHeader)
    {
        $this->groupHeader = $groupHeader;
    }

    /**
     * @return PaymentInformation
     */
    public function getPaymentInformation()
    {
        return $this->paymentInformation;
    }

    /**
     * @param PaymentInformation $paymentInformation
     */
    public function setPaymentInformation($paymentInformation)
    {
        $this->paymentInformation = $paymentInformation;
    }
}