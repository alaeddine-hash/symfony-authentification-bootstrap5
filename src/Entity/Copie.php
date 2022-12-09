<?php

namespace App\Entity;

use App\Repository\CopieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CopieRepository::class)
 */
class Copie
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
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $edition;

    /**
     * @ORM\OneToMany(targetEntity=Emprunte::class, mappedBy="copie")
     */
    private $empruntes;

    public function __construct()
    {
        $this->empruntes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(string $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * @return Collection<int, Emprunte>
     */
    public function getEmpruntes(): Collection
    {
        return $this->empruntes;
    }

    public function addEmprunte(Emprunte $emprunte): self
    {
        if (!$this->empruntes->contains($emprunte)) {
            $this->empruntes[] = $emprunte;
            $emprunte->setCopie($this);
        }

        return $this;
    }

    public function removeEmprunte(Emprunte $emprunte): self
    {
        if ($this->empruntes->removeElement($emprunte)) {
            // set the owning side to null (unless already changed)
            if ($emprunte->getCopie() === $this) {
                $emprunte->setCopie(null);
            }
        }

        return $this;
    }
}
