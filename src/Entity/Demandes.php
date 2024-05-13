<?php

namespace App\Entity;

use App\Repository\DemandesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandesRepository::class)
 */
class Demandes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $cuid;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $numDemande;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $cuidTec;

    /**
     * @ORM\Column(type="boolean", length=2, nullable=true)
     */
    private $pointeurFichier;

    /**
     * @ORM\Column(type="boolean", length=2, nullable=true)
     */
    private $pointeurInfo;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $statutAvancement;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deadLine;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateSaisie;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $dernierNiveau;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contrainte;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pointeurInfoLu;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="demandes")
     */
    private $demandeur;

    /**
     * @ORM\ManyToOne(targetEntity=DemandeTypes::class, inversedBy="typeDemande")
     */
    private $typeDemande;

    /**
     * @ORM\ManyToOne(targetEntity=DemandeEtats::class, inversedBy="demandeEtat")
     */
    private $typeEtat;

    /**
     * @ORM\OneToOne(targetEntity=SuiviInfo::class, inversedBy="demandeSuivi", cascade={"persist", "remove"})
     */
    private $suiviDemande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuid(): ?string
    {
        return $this->cuid;
    }

    public function setCuid(?string $cuid): self
    {
        $this->cuid = $cuid;

        return $this;
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

    public function getCuidTec(): ?string
    {
        return $this->cuidTec;
    }

    public function setCuidTec(?string $cuidTec): self
    {
        $this->cuidTec = $cuidTec;

        return $this;
    }

    public function isPointeurFichier(): ?bool
    {
        return $this->pointeurFichier;
    }

    public function setPointeurFichier(?bool $pointeurFichier): self
    {
        $this->pointeurFichier = $pointeurFichier;

        return $this;
    }

    public function isPointeurInfo(): ?bool
    {
        return $this->pointeurInfo;
    }

    public function setPointeurInfo(?bool $pointeurInfo): self
    {
        $this->pointeurInfo = $pointeurInfo;

        return $this;
    }

    public function getStatutAvancement(): ?string
    {
        return $this->statutAvancement;
    }

    public function setStatutAvancement(?string $statutAvancement): self
    {
        $this->statutAvancement = $statutAvancement;

        return $this;
    }

    public function getDeadLine(): ?\DateTimeInterface
    {
        return $this->deadLine;
    }

    public function setDeadLine(?\DateTimeInterface $deadLine): self
    {
        $this->deadLine = $deadLine;

        return $this;
    }

    public function getDateSaisie(): ?\DateTimeInterface
    {
        return $this->dateSaisie;
    }

    public function setDateSaisie(?\DateTimeInterface $dateSaisie): self
    {
        $this->dateSaisie = $dateSaisie;

        return $this;
    }

    public function getDernierNiveau(): ?string
    {
        return $this->dernierNiveau;
    }

    public function setDernierNiveau(string $DernierNiveau): self
    {
        $this->dernierNiveau = $DernierNiveau;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getContrainte(): ?string
    {
        return $this->contrainte;
    }

    public function setContrainte(?string $contrainte): self
    {
        $this->contrainte = $contrainte;

        return $this;
    }

    public function isPointeurInfoLu(): ?bool
    {
        return $this->pointeurInfoLu;
    }

    public function setPointeurInfoLu(?bool $pointeurInfoLu): self
    {
        $this->pointeurInfoLu = $pointeurInfoLu;

        return $this;
    }

    public function getDemandeur(): ?users
    {
        return $this->demandeur;
    }

    public function setDemandeur(?users $demandeur): self
    {
        $this->demandeur = $demandeur;

        return $this;
    }



    public function __construct()
    {
        $this->setPointeurFichier(False);
        $this->setPointeurInfo(False);
        $this->setPointeurInfoLu(False);
        $this->setStatutAvancement('0');
        $this->setDernierNiveau('0');
        $this->setDateSaisie(new \DateTime());
     }

    public function getTypeDemande(): ?DemandeTypes
    {
        return $this->typeDemande;
    }

    public function setTypeDemande(?DemandeTypes $typeDemande): self
    {
        $this->typeDemande = $typeDemande;

        return $this;
    }

    public function getTypeEtat(): ?DemandeEtats
    {
        return $this->typeEtat;
    }

    public function setTypeEtat(?DemandeEtats $typeEtat): self
    {
        $this->typeEtat = $typeEtat;

        return $this;
    }

    public function getSuiviDemande(): ?SuiviInfo
    {
        return $this->suiviDemande;
    }

    public function setSuiviDemande(?SuiviInfo $suiviDemande): self
    {
        $this->suiviDemande = $suiviDemande;

        return $this;
    }

    public function __toString(){
        return $this->numDemande;
    }
}
