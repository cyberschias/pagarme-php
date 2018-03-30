<?php

namespace PagarMe\Sdk\Transaction;

use PagarMe\Sdk\SplitRule\SplitRuleCollection;
use PagarMe\Sdk\SplitRule\SplitRule;

abstract class AbstractTransaction
{
    use \PagarMe\Sdk\Fillable;

    const PROCESSING      = 'processing';
    const AUTHORIZED      = 'authorized';
    const PAID            = 'paid';
    const REFUNDED        = 'refunded';
    const WAITING_PAYMENT = 'waiting_payment';
    const PENDING_REFUND  = 'pending_refund';
    const REFUSED         = 'refused';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $refuse_reason;

    /**
     * @var string
     */
    protected $status_reason;

    /**
     * @var string
     */
    protected $acquirer_name;

    /**
     * @var string
     */
    protected $acquirer_response_code;

    /**
     * @var string
     */
    protected $authorization_code;

    /**
     * @var string
     */
    protected $soft_descriptor;

    /**
     * @var string
     */
    protected $tid;

    /**
     * @var string
     */
    protected $nsu;

    /**
     * @var \DateTime
     */
    protected $date_created;

    /**
     * @var \DateTime
     */
    protected $date_updated;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $cost;

    /**
     * @var string
     */
    protected $postback_url;

    /**
     * @var string
     */
    protected $payment_method;

    /**
     * @var int
     */
    protected $antifraud_score;

    /**
     * @var string
     */
    protected $referer;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @var int
     */
    protected $subscription_id;

    /**
     * @var \PagarMe\Sdk\Customer\Phone
     */
    protected $phone;

    /**
     * @var \PagarMe\Sdk\Transaction\Address
     */
    protected $shipping;

    /**
     * @var array
     */
    protected $billing;

    /**
     * @var string of \PagarMe\Sdk\Transaction\Item
     */
    protected $items;

    /**
     * @var \PagarMe\Sdk\Customer\Customer
     */
    protected $customer;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var int
     */
    protected $paid_amount;

    /**
     * @var int
     */
    protected $refunded_amount;

    /**
     * @var \PagarMe\Sdk\SplitRule\SplitRuleCollection
     */
    protected $split_rules;

    /**
     * @var string
     */
    protected $token;

    /**
     * @param array $transactionData
     */
    public function __construct($transactionData)
    {
        $this->fill($transactionData);
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return array
     * @codeCoverageIgnore
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * @return array
     * @codeCoverageIgnore
     */
    public function getItems()
    {
        return (array)$this->items;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getRefuseReason()
    {
        return $this->refuse_reason;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getStatusReason()
    {
        return $this->status_reason;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getAcquirerName()
    {
        return $this->acquirer_name;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getAcquirerResponseCode()
    {
        return $this->acquirer_response_code;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getAuthorizationCode()
    {
        return $this->authorization_code;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getSoftDescriptor()
    {
        return $this->soft_descriptor;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getNsu()
    {
        return $this->nsu;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getPostbackUrl()
    {
        return $this->postback_url;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getAntifraudScore()
    {
        return $this->antifraud_score;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getSubscriptionId()
    {
        return $this->subscription_id;
    }

    /**
     * @return \PagarMe\Sdk\Customer\Phone
     * @codeCoverageIgnore
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return \PagarMe\Sdk\Customer\Address
     * @codeCoverageIgnore
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return \PagarMe\Sdk\Customer\Customer
     * @codeCoverageIgnore
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return PagarMe\Sdk\Card\Card
     * @codeCoverageIgnore
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @return array
     * @codeCoverageIgnore
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getPaidAmount()
    {
        return $this->paid_amount;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getRefundedAmount()
    {
        return $this->refunded_amount;
    }

    /**
     * @return boolean
     */
    public function isProcessing()
    {
        return $this->status == self::PROCESSING;
    }

    /**
     * @return boolean
     */
    public function isAuthorized()
    {
        return $this->status == self::AUTHORIZED;
    }

    /**
     * @return boolean
     */
    public function isPaid()
    {
        return $this->status == self::PAID;
    }

    /**
     * @return boolean
     */
    public function isRefunded()
    {
        return $this->status == self::REFUNDED;
    }

    /**
     * @return boolean
     */
    public function isWaitingPayment()
    {
        return $this->status == self::WAITING_PAYMENT;
    }

    /**
     * @return boolean
     */
    public function isPendingRefund()
    {
        return $this->status == self::PENDING_REFUND;
    }

    /**
     * @return boolean
     */
    public function isRefused()
    {
        return $this->status == self::REFUSED;
    }

    /**
     * @return \PagarMe\Sdk\SplitRule\SplitRuleCollection
     * @codeCoverageIgnore
     */
    public function getSplitRules()
    {
        return $this->split_rules;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
