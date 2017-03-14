<?php

namespace AppBundle\Entity;

class Product
{
    private $id;

    private $name;

    private $reference;

    private $owner;

    private $description;

    public function getId()
    {
        return $this->id;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
