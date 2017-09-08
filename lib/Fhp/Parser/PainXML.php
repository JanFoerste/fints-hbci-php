<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 14:42
 */

namespace Fhp\Parser;


use Fhp\Model\Pain\Creditor;
use Fhp\Model\Pain\CreditTransferTransactionInformation;
use Fhp\Model\Pain\Debtor;
use Fhp\Model\Pain\GroupHeader;
use Fhp\Model\Pain\Pain;
use Fhp\Model\Pain\PaymentInformation;

class PainXML
{
    /**
     * @TODO: support more formats
     */
    const PAIN_FORMAT = 'pain.001.003.03';

    /**
     * @var \DOMDocument
     */
    private $document;

    public function getAsXml(Pain $pain)
    {
        $this->document = new \DOMDocument('1.0', 'utf-8');
        $this->document->preserveWhiteSpace = false;
        $this->document->formatOutput = false;

        $root = $this->document->createElement('Document');
        $root->setAttribute('xmlns', sprintf('urn:iso:std:iso:20022:tech:xsd:%s', self::PAIN_FORMAT));
        $root->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $root->setAttribute('xsi:schemaLocation', sprintf('urn:iso:std:iso:20022:tech:xsd:%s %s.xsd', self::PAIN_FORMAT, self::PAIN_FORMAT));

        $init = $this->document->createElement(Pain::ROOT_TAG);
        $init->appendChild($this->createGroupHeaderXML($pain->getGroupHeader()));
        $init->appendChild($this->createPaymentInformationXML($pain->getPaymentInformation()));

        $root->appendChild($init);
        $this->document->appendChild($root);
        return $this->document->saveXML();
    }

    public function createGroupHeaderXML(GroupHeader $groupHeader)
    {
        $header = $this->document->createElement($groupHeader::TAG);
        $header->appendChild($this->document->createElement('MsgId', $groupHeader->getMessageId()));
        $header->appendChild($this->document->createElement('CreDtTm', $groupHeader->getCreationTime()));
        $header->appendChild($this->document->createElement('NbOfTxs', $groupHeader->getNumberOfTransactions()));
        $header->appendChild($this->document->createElement('CtrlSum', $groupHeader->getControlSum()));

        $inPty = $groupHeader->getInitiatingParty();
        $initParty = $this->document->createElement($inPty->getTag());
        $initParty->appendChild($this->document->createElement('Nm', $inPty->getName()));

        if ($inPty->getId()) {
            $initParty->appendChild($this->document->createElement('Id', $inPty->getId()));
        }

        if ($inPty->getIssuer()) {
            $initParty->appendChild($this->document->createElement('Issr', $inPty->getIssuer()));
        }

        $header->appendChild($initParty);
        return $header;
    }

    public function createPaymentInformationXML(PaymentInformation $paymentInformation)
    {
        $information = $this->document->createElement($paymentInformation::TAG);
        $information->appendChild($this->document->createElement('PmtInfId', $paymentInformation->getPaymentInformationId()));
        $information->appendChild($this->document->createElement('PmtMtd', $paymentInformation->getPaymentMethod()));
        $information->appendChild($this->document->createElement('NbOfTxs', $paymentInformation->getNumberOfTransactions()));
        $information->appendChild($this->document->createElement('CtrlSum', $paymentInformation->getControlSum()));

        $pmtTypeInfo = $paymentInformation->getPaymentTypeInformation();
        $paymentTypeInformation = $this->document->createElement($pmtTypeInfo->getTag());

        $serviceLevel = $this->document->createElement($pmtTypeInfo->getServiceLevel()->getTag());
        $serviceLevel->appendChild($this->document->createElement('Cd', $pmtTypeInfo->getServiceLevel()->getCode()));

        $paymentTypeInformation->appendChild($serviceLevel);
        $information->appendChild($paymentTypeInformation);

        $information->appendChild($this->document->createElement('ReqdExctnDt', $paymentInformation->getRequestedExecutionDate()));

        $information = $this->createDebtorXML($information, $paymentInformation->getDebtor());

        $information->appendChild($this->document->createElement('ChrgBr', $paymentInformation->getChargeBearer()));

        $information->appendChild($this->createCreditTransferTransactionInformationXML($paymentInformation->getCreditTransferTransactionInformation()));

        return $information;
    }

    public function createDebtorXML(\DOMElement $wrapper, Debtor $debtor)
    {
        // Dbtr
        $dbtr = $this->document->createElement('Dbtr');
        $dbtr->appendChild($this->document->createElement('Nm', $debtor->getName()));
        $wrapper->appendChild($dbtr);

        // DbtrAcct
        $dbtrAccount = $this->document->createElement('DbtrAcct');
        $acctId = $this->document->createElement('Id');
        $acctId->appendChild($this->document->createElement('IBAN', $debtor->getIban()));
        $dbtrAccount->appendChild($acctId);
        $wrapper->appendChild($dbtrAccount);

        // DbtrAgt
        $dbtrAgt = $this->document->createElement('DbtrAgt');
        $agtId = $this->document->createElement('FinInstnId');
        $agtId->appendChild($this->document->createElement('BIC', $debtor->getBic()));
        $dbtrAgt->appendChild($agtId);
        $wrapper->appendChild($dbtrAgt);

        return $wrapper;
    }

    public function createCreditTransferTransactionInformationXML(CreditTransferTransactionInformation $creditTransferTransactionInformation)
    {
        $information = $this->document->createElement(CreditTransferTransactionInformation::TAG);

        //Reference
        $pmtId = $this->document->createElement('PmtId');
        $pmtId->appendChild($this->document->createElement('EndToEndId', $creditTransferTransactionInformation->getEndToEndId()));
        $information->appendChild($pmtId);

        // Amount
        $amount = $this->document->createElement('Amt');
        $instructedAmount = $this->document->createElement('InstdAmt', $creditTransferTransactionInformation->getInstructedAmount());
        $instructedAmount->setAttribute('Ccy', $creditTransferTransactionInformation->getCurrency());
        $amount->appendChild($instructedAmount);
        $information->appendChild($amount);

        // Creditor
        $information = $this->createCreditorXML($information, $creditTransferTransactionInformation->getCreditor());

        $rmtInf = $this->document->createElement('RmtInf');
        $rmtInf->appendChild($this->document->createElement('Ustrd', $creditTransferTransactionInformation->getUnstructured()));
        $information->appendChild($rmtInf);

        return $information;
    }

    public function createCreditorXML(\DOMElement $wrapper, Creditor $creditor)
    {
        // Cdtr
        $cdtr = $this->document->createElement('Cdtr');
        $cdtr->appendChild($this->document->createElement('Nm', $creditor->getName()));
        $wrapper->appendChild($cdtr);

        // CdtrAcct
        $cdtrAccount = $this->document->createElement('CdtrAcct');
        $acctId = $this->document->createElement('Id');
        $acctId->appendChild($this->document->createElement('IBAN', $creditor->getIban()));
        $cdtrAccount->appendChild($acctId);
        $wrapper->appendChild($cdtrAccount);

        // CdtrAgt
        $cdtrAgt = $this->document->createElement('CdtrAgt');
        $agtId = $this->document->createElement('FinInstnId');
        $agtId->appendChild($this->document->createElement('BIC', $creditor->getBic()));
        $cdtrAgt->appendChild($agtId);
        $wrapper->appendChild($cdtrAgt);

        return $wrapper;
    }
}