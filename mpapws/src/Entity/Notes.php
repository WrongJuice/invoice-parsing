<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotesRepository")
 */
class Notes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Valeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BandeDessinee", inversedBy="sesNotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $saBandeDessinee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?int
    {
        return $this->Valeur;
    }

    public function setValeur(int $Valeur): self
    {
        $this->Valeur = $Valeur;

        return $this;
    }

    public function getSaBandeDessinee(): ?BandeDessinee
    {
        return $this->saBandeDessinee;
    }

    public function setSaBandeDessinee(?BandeDessinee $saBandeDessinee): self
    {
        $this->saBandeDessinee = $saBandeDessinee;

        return $this;
    }
}
