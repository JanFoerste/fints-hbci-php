<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 07.09.2017
 * Time: 11:18
 */

namespace Fhp\Model\Pain;

class GroupHeader
{
    const TAG = 'GrpHdr';

    /**
     * Tag: MsgId
     *
     * @var string
     */
    private $messageId;

    /**
     * Format: YYYY-MM-DDThh:mm:ss
     * Tag: CreDtTm
     *
     * @var string
     */
    private $creationTime;

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
     * Tag InitgPty
     *
     * @var InitiatingParty
     */
    private $initiatingParty;

    /**
     * GroupHeader constructor.
     * @param string $messageId
     * @param int $numberOfTransactions
     * @param float $controlSum
     * @param InitiatingParty $initiatingParty
     */
    public function __construct($messageId, $numberOfTransactions, $controlSum, InitiatingParty $initiatingParty)
    {
        $this->messageId = $messageId;
        $this->creationTime = gmdate('Y-m-d\TH-i-s\Z');
        $this->numberOfTransactions = $numberOfTransactions;
        $this->controlSum = $controlSum;
        $this->initiatingParty = $initiatingParty;
    }

    /**
     * @return string
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param string $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return string
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * @param \DateTime $creationTime
     */
    public function setCreationTime(\DateTime $creationTime)
    {
        $formatted = $creationTime->format('Y-m-d\TH-i-s\Z');
        $this->creationTime = $formatted;
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
        return number_format($this->controlSum, 2);
    }

    /**
     * @param float $controlSum
     */
    public function setControlSum($controlSum)
    {
        $this->controlSum = $controlSum;
    }

    /**
     * @return InitiatingParty
     */
    public function getInitiatingParty()
    {
        return $this->initiatingParty;
    }

    /**
     * @param InitiatingParty $initiatingParty
     */
    public function setInitiatingParty($initiatingParty)
    {
        $this->initiatingParty = $initiatingParty;
    }
}