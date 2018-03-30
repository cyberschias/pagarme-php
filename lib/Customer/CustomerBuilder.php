<?php

namespace PagarMe\Sdk\Customer;

trait CustomerBuilder
{
    /**
     * @param array $customerData
     * @return Customer
     */
    private function buildCustomer($customerData)
    {
        $customerData->documents = new Document($customerData->documents[0]);

        return new Customer(get_object_vars($customerData));
    }

    /**
     * @param array $customerData
     * @return Customer
     */
    private function buildCustomerFromResponse($customerData, $documentsData)
    {
        if (is_null($customerData) || $customerData == new \stdClass()) {
            return null;
        }

        if (!is_null($documentsData) and $documentsData = (array)$documentsData) {
            $documents = array(
                // Por default cpf, pois a Dela More não vende para PJ
                'type' => $documentsData[0]->type,
                'number' => $documentsData[0]->number,
            );
            $customerData->documents = new Document($documents);
        }

        return new Customer(get_object_vars($customerData));
    }
}
