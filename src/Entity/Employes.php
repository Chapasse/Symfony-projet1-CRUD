<?php

namespace App\Entity;

use DateInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmployesRepository;
use DateTime;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $_id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?string $_prenom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?string $_nom = null;
    
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?string $_telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?string $_email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?string $_adresse = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?string $_poste = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?int $_salaire = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?DateTimeInterface $_datenaissance = null;

    public function getId(): ?int
    {
        return $this->_id;
    }

    public function getPrenom(): ?string
    {
        return $this->_prenom;
    }

    public function setPrenom(string $_prenom): self
    {
        $this->_prenom = $_prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->_nom;
    }

    public function setNom(string $_nom): self
    {
        $this->_nom = $_nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->_telephone;
    }

    public function setTelephone(string $_telephone): self
    {
        $this->_telephone = $_telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->_email;
    }

    public function setEmail(string $_email): self
    {
        $this->_email = $_email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->_adresse;
    }

    public function setAdresse(string $_adresse): self
    {
        $this->_adresse = $_adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->_poste;
    }

    public function setPoste(string $_poste): self
    {
        $this->_poste = $_poste;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->_salaire;
    }

    public function setSalaire(int $_salaire): self
    {
        $this->_salaire = $_salaire;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->_datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $_datenaissance): self
    {
        $this->_datenaissance = $_datenaissance;

        return $this;
    }
}
