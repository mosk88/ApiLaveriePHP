<?php

namespace Src\Entity;

use JsonSerializable;

/**
 * Service represente une occurence de la table Service sous forme d'objet PHP
 */
class Service implements JsonSerializable
{

    private int $service_id;
    private string $service_name;
    private float $service_price;



    public function __construct(int $id, string $name, float $price)
    {
        $this->service_id = $id;
        $this->service_name = $name;
        $this->service_price = $price;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "price" => $this->getPrice()
        ];
    }

    static public function fromArray($array):self{
        return new self($array["service_id"], $array["service_name"], $array["service_price"]);
    }

    /**
     * Get the value of id
     */
   

    /**
     * Get the value of service_id
     */ 
    public function getService_id()
    {
        return $this->service_id;
    }

    /**
     * Get the value of service_name
     */ 
    public function getService_name()
    {
        return $this->service_name;
    }

    /**
     * Set the value of service_name
     *
     * @return  self
     */ 
    public function setService_name($service_name)
    {
        $this->service_name = $service_name;

        return $this;
    }

    /**
     * Get the value of service_price
     */ 
    public function getService_price()
    {
        return $this->service_price;
    }

    /**
     * Set the value of service_price
     *
     * @return  self
     */ 
    public function setService_price($service_price)
    {
        $this->service_price = $service_price;

        return $this;
    }
}

