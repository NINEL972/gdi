<?php

namespace App\Entity;

use App\Repository\SuiviInfoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuiviInfoRepository::class)
 */
class SuiviInfo
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
    private $numDemande;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaires;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $cuidEcrivain;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $dateInfo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pointeurLu;

    /**
     * @ORM\OneToOne(targetEntity=Demandes::class, mappedBy="suiviDemande", cascade={"persist", "remove"})
     */
    private $demandeSuivi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumDemande(): ?string
    {
        return $this->numDemande;
    }

    public function setNumDemande(?string $numDemande): self
    {
        $this->numDemande = $numDemande;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(?string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getCuidEcrivain(): ?string
    {
        return $this->cuidEcrivain;
    }

    public function setCuidEcrivain(?string $cuidEcrivain): self
    {
        $this->cuidEcrivain = $cuidEcrivain;

        return $this;
    }

    public function getDateInfo(): ?string
    {
        return $this->dateInfo;
    }

    public function setDateInfo(?string $dateInfo): self
    {
        $this->dateInfo = $dateInfo;

        return $this;
    }

    public function isPointeurLu(): ?bool
    {
        return $this->pointeurLu;
    }

    public function setPointeurLu(?bool $pointeurLu): self
    {
        $this->pointeurLu = $pointeurLu;

        return $this;
    }

    public function getDemandeSuivi(): ?Demandes
    {
        return $this->demandeSuivi;
    }

    public function setDemandeSuivi(?Demandes $demandeSuivi): self
    {
        // unset the owning side of the relation if necessary
        if ($demandeSuivi === null && $this->demandeSuivi !== null) {
            $this->demandeSuivi->setSuiviDemande(null);
        }

        // set the owning side of the relation if necessary
        if ($demandeSuivi !== null && $demandeSuivi->getSuiviDemande() !== $this) {
            $demandeSuivi->setSuiviDemande($this);
        }

        $this->demandeSuivi = $demandeSuivi;

        return $this;
    }

    public function __toString(){
        return $this->commentaires;
    }
    
}
