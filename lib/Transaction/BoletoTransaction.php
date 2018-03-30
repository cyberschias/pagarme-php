<?php

namespace PagarMe\Sdk\Transaction;

class BoletoTransaction extends AbstractTransaction
{
    const PAYMENT_METHOD = 'boleto';

    /**
     * @var string
     */
    protected $boleto_url;

    /**
     * @var string
     */
    protected $boleto_barcode;

    /**
     * @var \DateTime
     */
    protected $boleto_expiration_date;

    /**
     * @var boolean
     */
    protected $async;

    /**
     * @var string
     */
    protected $softDescriptor;

    /**
     * @var string
     */
    protected $boleto_instructions;

    /**
     * @param array $transactionData
     */
    public function __construct($transactionData)
    {
        parent::__construct($transactionData);
        $this->payment_method = self::PAYMENT_METHOD;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getBoletoExpirationDate()
    {
        return $this->boleto_expiration_date;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getBoletoUrl()
    {
        return $this->boleto_url;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getBoletoBarcode()
    {
        return $this->boleto_barcode;
    }

    /**
     * @return boolean
     * @codeCoverageIgnore
     */
    public function getAsync()
    {
        return $this->async;
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
    public function getBoletoInstructions()
    {
        return $this->boleto_instructions;
    }
}
