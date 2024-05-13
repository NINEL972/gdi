<?php

namespace App\Entity;

use App\Repository\FichierRecusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichierRecusRepository::class)
 */
class FichierRecus
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
    private $nomFichier;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $cuidEcrivain;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pointeurFichier;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFichier(): ?string
    {
        return $this->nomFichier;
    }

    public function setNomFichier(?string $nomFichier): self
    {
        $this->nomFichier = $nomFichier;

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

    public function isPointeurFichier(): bool
    {
        return $this->pointeurFichier;
    }

    public function setPointeurFichier(bool $pointeurFichier): self
    {
        $this->pointeurFichier = $pointeurFichier;

        return $this;
    }

    public function getDateFichier(): ?\DateTimeInterface
    {
        return $this->dateFichier;
    }

    public function setDateFichier(?\DateTimeInterface $dateFichier): self
    {
        $this->dateFichier = $dateFichier;

        return $this;
    }
}
