<?php

namespace PagarMe\Sdk\Transaction;

class Address
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $street_number;

    /**
     * @var string
     */
    private $neighborhood;

    /**
     * @var string
     */
    private $zipcode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $country;

    /**
     * @param array $addressData
     */
    public function __construct($addressData)
    {
        $this->fill($addressData);
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getStreetNumber()
    {
        return $this->street_number;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }


    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getCountry()
    {
        return $this->country;
    }
}
