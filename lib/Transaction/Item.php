<?php

namespace PagarMe\Sdk\Transaction;

class Item
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $unit_price;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var bool
     */
    private $tangible;

    /**
     * @param array $addressData
     */
    public function __construct($addressData)
    {
        $this->fill($addressData);
    }

    /**
     * @return id
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * @return bool
     * @codeCoverageIgnore
     */
    public function getTangible()
    {
        return $this->tangible;
    }

}
