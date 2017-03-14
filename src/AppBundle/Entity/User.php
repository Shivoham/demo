<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Knp\Rad\User\HasPassword;
use Doctrine\Common\Collections\ArrayCollection;

class User implements UserInterface, HasPassword
{
    use HasPassword\HasPassword;

    private $id;

    private $email;

    private $password;

    private $roles;

    private $products;

    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
        $this->products = new ArrayCollection();
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getSalt()
    {
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
    }
}
