<?php

namespace PagarMe\Sdk\Customer;

class Customer
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int | Gerado pela Pagar.me
     */
    private $id;

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
     * @var Document | Documento. Contém campos type para tipo de documento e number para número do documento.
     */
    private $documents;

    /**
     * @param array $arrayData
     */
    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @codeCoverageIgnore
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @codeCoverageIgnore
     * @return int
     */
    public function getExternalId()
    {
        return $this->external_id;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @codeCoverageIgnore
     * @return Document
     */
    public function getDocuments()
    {
        $documentsData = [
            'type' => $this->documents->getType(),
            'number' => $this->documents->getNumber()
        ];

        return array($documentsData);
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getPhoneNumbers()
    {
        return $this->phone_numbers;
    }
}
