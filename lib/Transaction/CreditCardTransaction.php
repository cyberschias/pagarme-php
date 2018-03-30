<?php

namespace PagarMe\Sdk\Transaction;

class CreditCardTransaction extends AbstractTransaction
{
    const PAYMENT_METHOD = 'credit_card';

    /**
     * @var string $card_number
     */
    protected $card_number;

    /**
     * @var string $card_cvv
     */
    protected $card_cvv;

    /**
     * @var string $card_expiration_date
     */
    protected $card_expiration_date;

    /**
     * @var string $card_holder_name
     */
    protected $card_holder_name;

    /**
     * @var string $installments
     */
    protected $installments;

    /**
     * @param array $transactionData
     */
    public function __construct($transactionData)
    {
        parent::__construct($transactionData);
        $this->paymentMethod = self::PAYMENT_METHOD;
    }


    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getCardNumber()
    {
        return $this->card_number;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getCardCcv()
    {
        return $this->card_cvv;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getCardExpirationDate()
    {
        return $this->card_expiration_date;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getCardHolderName()
    {
        return $this->card_holder_name;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getInstallments()
    {
        return $this->installments;
    }


}
