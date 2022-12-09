<?php

namespace App\Entity;

use App\Repository\EmprunteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmprunteRepository::class)
 */
class Emprunte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_pret;

    /**
     * @ORM\Column(type="date")
     */
    private $date_prevus_rendre;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_rendre;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="empruntes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Copie::class, inversedBy="empruntes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $copie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDePret(): ?\DateTimeInterface
    {
        return $this->date_de_pret;
    }

    public function setDateDePret(\DateTimeInterface $date_de_pret): self
    {
        $this->date_de_pret = $date_de_pret;

        return $this;
    }

    public function getDatePrevusRendre(): ?\DateTimeInterface
    {
        return $this->date_prevus_rendre;
    }

    public function setDatePrevusRendre(\DateTimeInterface $date_prevus_rendre): self
    {
        $this->date_prevus_rendre = $date_prevus_rendre;

        return $this;
    }

    public function getDateDeRendre(): ?\DateTimeInterface
    {
        return $this->date_de_rendre;
    }

    public function setDateDeRendre(\DateTimeInterface $date_de_rendre): self
    {
        $this->date_de_rendre = $date_de_rendre;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getCopie(): ?Copie
    {
        return $this->copie;
    }

    public function setCopie(?Copie $copie): self
    {
        $this->copie = $copie;

        return $this;
    }
}
