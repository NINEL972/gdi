<?php

namespace App\Entity;

use App\Repository\DemandeTypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeTypesRepository::class)
 */
class DemandeTypes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nomType;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $numType;

    /**
     * @ORM\OneToMany(targetEntity=Demandes::class, mappedBy="typeDemande")
     */
    private $typeDemande;

    public function __construct()
    {
        $this->typeDemande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomType(): ?string
    {
        return $this->nomType;
    }

    public function setNomType(?string $nomType): self
    {
        $this->nomType = $nomType;

        return $this;
    }

    public function getNumType(): ?string
    {
        return $this->numType;
    }

    public function setNumType(?string $numType): self
    {
        $this->numType = $numType;

        return $this;
    }

    /**
     * @return Collection<int, Demandes>
     */
    public function getTypeDemande(): Collection
    {
        return $this->typeDemande;
    }

    public function addTypeDemande(Demandes $typeDemande): self
    {
        if (!$this->typeDemande->contains($typeDemande)) {
            $this->typeDemande[] = $typeDemande;
            $typeDemande->setTypeDemande($this);
        }

        return $this;
    }

    public function removeTypeDemande(Demandes $typeDemande): self
    {
        if ($this->typeDemande->removeElement($typeDemande)) {
            // set the owning side to null (unless already changed)
            if ($typeDemande->getTypeDemande() === $this) {
                $typeDemande->setTypeDemande(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->nomType;
    }
}
