<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Auteur;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $Contenu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BandeDessinee", inversedBy="sesCommentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $saBandeDessinee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->Auteur;
    }

    public function setAuteur(string $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): self
    {
        $this->Contenu = $Contenu;

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
