<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $Cuid;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Service;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $Niveau;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $emailpro;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $emailteam;

    /**
     * @ORM\OneToMany(targetEntity=Demandes::class, mappedBy="demandeur")
     */
    private $demandes;

    public function __construct()
    {
        $this->demandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuid(): ?string
    {
        return $this->Cuid;
    }

    public function setCuid(?string $Cuid): self
    {
        $this->Cuid = $Cuid;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->Service;
    }

    public function setService(?string $Service): self
    {
        $this->Service = $Service;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->Niveau;
    }

    public function setNiveau(?string $Niveau): self
    {
        $this->Niveau = $Niveau;

        return $this;
    }

    public function getEmailpro(): ?string
    {
        return $this->emailpro;
    }

    public function setEmailpro(?string $emailpro): self
    {
        $this->emailpro = $emailpro;

        return $this;
    }

    public function getEmailteam(): ?string
    {
        return $this->emailteam;
    }

    public function setEmailteam(?string $emailteam): self
    {
        $this->emailteam = $emailteam;

        return $this;
    }

    /**
     * @return Collection<int, Demandes>
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demandes $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes[] = $demande;
            $demande->setDemandeur($this);
        }

        return $this;
    }

    public function removeDemande(Demandes $demande): self
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getDemandeur() === $this) {
                $demande->setDemandeur(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->Nom.' '.$this->Prenom.' ('.$this->Cuid.')';
    }
    
}
