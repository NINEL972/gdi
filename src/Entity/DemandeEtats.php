<?php

namespace App\Entity;

use App\Repository\DemandeEtatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeEtatsRepository::class)
 */
class DemandeEtats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $avancement;

    /**
     * @ORM\OneToMany(targetEntity=Demandes::class, mappedBy="typeEtat")
     */
    private $demandeEtat;

    public function __construct()
    {
        $this->demandeEtat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAvancement(): ?string
    {
        return $this->avancement;
    }

    public function setAvancement(?string $avancement): self
    {
        $this->avancement = $avancement;

        return $this;
    }

    /**
     * @return Collection<int, Demandes>
     */
    public function getDemandeEtat(): Collection
    {
        return $this->demandeEtat;
    }

    public function addDemandeEtat(Demandes $demandeEtat): self
    {
        if (!$this->demandeEtat->contains($demandeEtat)) {
            $this->demandeEtat[] = $demandeEtat;
            $demandeEtat->setTypeEtat($this);
        }

        return $this;
    }

    public function removeDemandeEtat(Demandes $demandeEtat): self
    {
        if ($this->demandeEtat->removeElement($demandeEtat)) {
            // set the owning side to null (unless already changed)
            if ($demandeEtat->getTypeEtat() === $this) {
                $demandeEtat->setTypeEtat(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->description;
    }
}
