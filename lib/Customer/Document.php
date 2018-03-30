<?php

namespace PagarMe\Sdk\Customer;

class Document
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var string $type
     * Obrigatório. Tipo de documento.
     * Para compradores brasileiros, deve ser fornecido ao menos um CPF (no caso de pessoa física, i.e. individual)
     * ou CNPJ (no caso de pessoa jurídica, i.e. corporation). Para compradores internacionais, o documento pode ser
     * um passaporte ou um campo personalizado.
     */
    private $type;

    /**
     * @var string $number - Obrigatório. Número do documento
     */
    private $number;

    /**
     * @param array $documentData
     */
    public function __construct($documentData)
    {
        $this->fill($documentData);
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getNumber()
    {
        return $this->number;
    }
}
