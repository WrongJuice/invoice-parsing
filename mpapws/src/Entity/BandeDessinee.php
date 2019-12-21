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

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDeParution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LivrePDF;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Planche1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Planche2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Planche3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Planche4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Planche5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Affiche;

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

    public function getDateDeParution(): ?\DateTimeInterface
    {
        return $this->DateDeParution;
    }

    public function setDateDeParution(\DateTimeInterface $DateDeParution): self
    {
        $this->DateDeParution = $DateDeParution;

        return $this;
    }

    public function getLivrePDF(): ?string
    {
        return '/data/' . $this->getId() . '/livre.pdf';
    }

    public function setLivrePDF(string $LivrePDF): self
    {
        $this->LivrePDF = $LivrePDF;

        return $this;
    }

    public function getPlanche1(): ?string
    {
        return '/data/' . $this->getId() . '/p1.jpg';
    }

    public function setPlanche1(?string $Planche1): self
    {
        $this->Planche1 = $Planche1;

        return $this;
    }

    public function getPlanche2(): ?string
    {
        return '/data/' . $this->getId() . '/p2.jpg';
    }

    public function setPlanche2(?string $Planche2): self
    {
        $this->Planche2 = $Planche2;

        return $this;
    }

    public function getPlanche3(): ?string
    {
        return '/data/' . $this->getId() . '/p3.jpg';
    }

    public function setPlanche3(?string $Planche3): self
    {
        $this->Planche3 = $Planche3;

        return $this;
    }

    public function getPlanche4(): ?string
    {
        return '/data/' . $this->getId() . '/p4.jpg';
    }

    public function setPlanche4(?string $Planche4): self
    {
        $this->Planche4 = $Planche4;

        return $this;
    }

    public function getPlanche5(): ?string
    {
        return '/data/' . $this->getId() . '/p5.jpg';
    }

    public function setPlanche5(?string $Planche5): self
    {
        $this->Planche5 = $Planche5;

        return $this;
    }

    public function getAffiche(): ?string
    {
        return '/data/' . $this->getId() . '/affiche.jpg';
    }

    public function setAffiche(string $Affiche): self
    {
        $this->Affiche = $Affiche;

        return $this;
    }
}
