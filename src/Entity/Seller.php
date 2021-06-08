<?php

namespace App\Entity;

use App\Repository\SellerRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SellerRepository::class)
 */
class Seller
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactPhoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $floozPhoneNumber;

    /**
     * @ORM\ManyToOne(targetEntity=pay::class, inversedBy="sellers")
     */
    private $pay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getContactPhoneNumber(): ?string
    {
        return $this->contactPhoneNumber;
    }

    public function setContactPhoneNumber(string $contactPhoneNumber): self
    {
        $this->contactPhoneNumber = $contactPhoneNumber;

        return $this;
    }

    public function getFloozPhoneNumber(): ?string
    {
        return $this->floozPhoneNumber;
    }

    public function setFloozPhoneNumber(string $floozPhoneNumber): self
    {
        $this->floozPhoneNumber = $floozPhoneNumber;

        return $this;
    }

    public function getPay(): ?pay
    {
        return $this->pay;
    }

    public function setPay(?pay $pay): self
    {
        $this->pay = $pay;

        return $this;
    }
}
