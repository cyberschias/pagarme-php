<?php

namespace PagarMe\Sdk\Customer\Request;

use PagarMe\Sdk\Customer\Document;
use PagarMe\Sdk\RequestInterface;
use PagarMe\Sdk\Customer\Address;
use PagarMe\Sdk\Customer\Phone;

class CustomerCreate implements RequestInterface
{
    /**
     * @var string | Obrigatório - Identificador do cliente na loja
     */
    private $external_id;

     /**
     * @var string | Obrigatório - Nome ou razão social do comprador
     */
    private $name;

     /**
     * @var string | Obrigatório - E-mail do comprador
     */
    private $email;

     /**
     * @var string | Obrigatório - Tipo de documento.
     * Deve ser individual para pessoa física ou corporation para pessoa jurídica
     */
    private $type;

    /**
     * @var string | Obrigatório - País. Duas letras minúsculas, seguindo o padrão ISO 3166-1 alpha-2
     */
    private $country;

    /**
     * @var string | Data de nascimento. Deve seguir o formato AAAA-MM-DD.
     * Por exemplo, para 20/12/1990 birthday seria 1990-12-20
     */
    private $birthday;

     /**
     * @var array | Obrigatório. Telefone. Requer ao menos um valor. Deve seguir o padrão E.164
     */
    private $phone_numbers;

    /**
     * @var array | Documento. Contém campos type para tipo de documento e number para número do documento.
     */
    private $documents;


    /**
     * @param string $name Obrigatório - Nome ou razão social do comprador
     * @param string $email Obrigatório - E-mail do comprador
     * @param string $external_id Obrigatório - Identificador do cliente na loja
     * @param string $type Obrigatório - Tipo de documento. Deve ser individual para pessoa física ou corporation para pessoa jurídica
     * @param string $country - Obrigatório - País. Duas letras minúsculas, seguindo o padrão ISO 3166-1 alpha-2
     * @param string $birthday - Data de nascimento. Deve seguir o formato AAAA-MM-DD. Por exemplo, para 20/12/1990 birthday seria 1990-12-20
     * @param array  $phone_numbers - Obrigatório. Telefone. Requer ao menos um valor. Deve seguir o padrão E.164
     * @param array  $documents - Documento. Contém campos type para tipo de documento e number para número do documento.
     */
    public function __construct(
        $name,
        $email,
        $external_id,
        $type,
        $country,
        $birthday,
        $phone_numbers,
        $documents
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->external_id = $external_id;
        $this->type = $type;
        $this->country = $country;
        $this->birthday = $birthday;
        $this->phone_numbers = $phone_numbers;
        $this->documents = $documents;
    }

    /**
     *  @return array
     */
    public function getPayload()
    {
        return [
            'name'        => $this->name,
            'email'       => $this->email,
            'external_id' => $this->external_id,
            'type'        => $this->type,
            'country'     => $this->country,
            'birthday'    => $this->birthday,
            'phone_numbers' => $this->phone_numbers,
            'documents'   => $this->getDocumentsData(),
        ];
    }

    /**
     *  @return string
     */
    public function getPath()
    {
        return 'customers';
    }

    /**
     *  @return string
     */
    public function getMethod()
    {
        return self::HTTP_POST;
    }

    /**
     *  @return array
     */
    private function getDocumentsData()
    {
        $documentsData = [
            'type' => $this->documents->getType(),
            'number' => $this->documents->getNumber()
        ];

        return array($documentsData);
    }
}
