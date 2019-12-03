<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BandeDessineeRepository")
 */
class BandeDessinee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Auteur;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Genre;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $SousGenre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="saBandeDessinee", orphanRemoval=true)
     */
    private $sesCommentaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notes", mappedBy="saBandeDessinee", orphanRemoval=true)
     */
    private $sesNotes;

    public function __construct()
    {
        $this->sesCommentaires = new ArrayCollection();
        $this->sesNotes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getSousGenre(): ?string
    {
        return $this->SousGenre;
    }

    public function setSousGenre(string $SousGenre): self
    {
        $this->SousGenre = $SousGenre;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getSesCommentaires(): Collection
    {
        return $this->sesCommentaires;
    }

    public function addSesCommentaire(Commentaire $sesCommentaire): self
    {
        if (!$this->sesCommentaires->contains($sesCommentaire)) {
            $this->sesCommentaires[] = $sesCommentaire;
            $sesCommentaire->setSaBandeDessinee($this);
        }

        return $this;
    }

    public function removeSesCommentaire(Commentaire $sesCommentaire): self
    {
        if ($this->sesCommentaires->contains($sesCommentaire)) {
            $this->sesCommentaires->removeElement($sesCommentaire);
            // set the owning side to null (unless already changed)
            if ($sesCommentaire->getSaBandeDessinee() === $this) {
                $sesCommentaire->setSaBandeDessinee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notes[]
     */
    public function getSesNotes(): Collection
    {
        return $this->sesNotes;
    }

    public function addSesNote(Notes $sesNote): self
    {
        if (!$this->sesNotes->contains($sesNote)) {
            $this->sesNotes[] = $sesNote;
            $sesNote->setSaBandeDessinee($this);
        }

        return $this;
    }

    public function removeSesNote(Notes $sesNote): self
    {
        if ($this->sesNotes->contains($sesNote)) {
            $this->sesNotes->removeElement($sesNote);
            // set the owning side to null (unless already changed)
            if ($sesNote->getSaBandeDessinee() === $this) {
                $sesNote->setSaBandeDessinee(null);
            }
        }

        return $this;
    }
}
