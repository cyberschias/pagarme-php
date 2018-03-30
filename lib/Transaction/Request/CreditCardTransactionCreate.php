<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\Transaction\CreditCardTransaction;

class CreditCardTransactionCreate extends TransactionCreate
{
    /**
     * @param CreditCardTransaction $transaction
     */
    public function __construct(CreditCardTransaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        $basicData = parent::getPayload();

        $cardData = [
            'card_number' => $this->transaction->getCardNumber(),
            'card_cvv' => $this->transaction->getCardCcv(),
            'card_expiration_date' => $this->transaction->getCardExpirationDate(),
            'card_holder_name' => $this->transaction->getCardHolderName(),
            'installments' => $this->transaction->getInstallments(),
        ];

        return array_merge($basicData, $cardData);
    }
}
