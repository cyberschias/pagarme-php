<?php

namespace PagarMe\Sdk\Customer;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\Client;
use PagarMe\Sdk\Customer\Request\CustomerCreate;
use PagarMe\Sdk\Customer\Request\CustomerGet;
use PagarMe\Sdk\Customer\Request\CustomerList;
use PagarMe\Sdk\Customer\Address;
use PagarMe\Sdk\Customer\Phone;

class CustomerHandler extends AbstractHandler
{
    use CustomerBuilder;

    /**
     * @param string $name Obrigatório - Nome ou razão social do comprador
     * @param string $email Obrigatório - E-mail do comprador
     * @param string $external_id Obrigatório - Identificador do cliente na loja
     * @param string $type Obrigatório - Tipo de documento. Deve ser individual para pessoa física ou corporation para pessoa jurídica
     * @param string $country - Obrigatório - País. Duas letras minúsculas, seguindo o padrão ISO 3166-1 alpha-2
     * @param string $birthday - Data de nascimento. Deve seguir o formato AAAA-MM-DD. Por exemplo, para 20/12/1990 birthday seria 1990-12-20
     * @param array  $phone_numbers - Obrigatório. Telefone. Requer ao menos um valor. Deve seguir o padrão E.164
     * @param Document  $documents - Documento. Contém campos type para tipo de documento e number para número do documento.
     */
    public function create(
        $name,
        $email,
        $external_id,
        $type,
        $country,
        $birthday = null,
        $phone_numbers,
        Document $documents
    ) {
        $request = new CustomerCreate(
            $name,
            $email,
            $external_id,
            $type,
            $country,
            $birthday,
            $phone_numbers,
            $documents
        );

        $response = $this->client->send($request);

        return $this->buildCustomer($response);
    }

    /**
     * @param int $customerId
     */
    public function get($customerId)
    {
        $request = new CustomerGet($customerId);
        $response = $this->client->send($request);

        return $this->buildCustomer($response);
    }

    /**
     * @param int $page
     * @param int $count
     */
    public function getList($page = null, $count = null)
    {
        $request = new CustomerList($page, $count);
        $response = $this->client->send($request);

        $customers = [];
        foreach ($response as $customerResponse) {
            $customers[] = $this->buildCustomer($customerResponse);
        }

        return $customers;
    }
}
