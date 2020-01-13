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
     * @ORM\Column(type="float", nullable=true)
     */
    private $NoteMoyenne;

    /**
     * @ORM\Column(type="integer")
     */
    private $estPopulaire;

    public function __construct()
    {
        $this->sesCommentaires = new ArrayCollection();
        $this->sesNotes = new ArrayCollection();
        $this->setNoteMoyenne();
        $this->verifieEstPopulaire();
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

        $this->setNoteMoyenne();
        $this->verifieEstPopulaire();
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

        $this->setNoteMoyenne();
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

    public function getPlanche1(): ?string
    {
        return '/data/' . $this->getId() . '/p1.jpg';
    }

    public function getPlanche2(): ?string
    {
        return '/data/' . $this->getId() . '/p2.jpg';
    }

    public function getPlanche3(): ?string
    {
        return '/data/' . $this->getId() . '/p3.jpg';
    }

    public function getPlanche4(): ?string
    {
        return '/data/' . $this->getId() . '/p4.jpg';
    }

    public function getPlanche5(): ?string
    {
        return '/data/' . $this->getId() . '/p5.jpg';
    }

    public function getAffiche(): ?string
    {
        return '/data/' . $this->getId() . '/affiche.jpg';
    }

    public function getNbCommentaires(){

        /* Fonction qui récupère le nombre de commentaires pour une BD */

        $Commentaires = $this->getSesCommentaires();
        $nbCommentaires = 0;

        foreach($Commentaires as $Commentaire)
        {
            $nbCommentaires += 1;
        }

        return $nbCommentaires;
    }

    public function getNbNotes(){

        /* Fonction qui récupère le nombre de commentaires pour une BD */

        $Notes = $this->getSesNotes();
        $nbNotes = 0;

        foreach($Notes as $Note)
        {
            $nbNotes += 1;
        }

        return $nbNotes;
    }

    public function getNoteMoyenne(){

        /* Fonction qui récupère une note moyenne à partir d'une liste de notes */

        $Notes = $this->getSesNotes();
        $NoteMoyenne = 0;
        $i = 0;

        foreach($Notes as $Note)
        {
            $NoteMoyenne += $Note->getValeur();
            $i++;
        }
        if ($i != 0){
            $NoteMoyenne = $NoteMoyenne / $i;
            $NoteMoyenne = number_format($NoteMoyenne, 2, ',', ' ');
        }else $NoteMoyenne = null;



        $this->setNoteMoyenne();
        return $this->NoteMoyenne;
    }

    public function setNoteMoyenne(): self
    {
        /* Fonction qui set sa note moyenne */

        $Notes = $this->getSesNotes();
        $NoteMoyenne = 0;
        $i = 0;

        foreach($Notes as $Note)
        {
            $NoteMoyenne += $Note->getValeur();
            $i++;
        }
        if ($i != 0){
            $NoteMoyenne = $NoteMoyenne / $i;
            $NoteMoyenne = number_format($NoteMoyenne, 2, ',', ' ');
        }
        else $NoteMoyenne = -1;

        $this->NoteMoyenne = $NoteMoyenne;

        return $this;
    }

    public function getEstPopulaire(): ?int
    {
        return $this->estPopulaire;
    }

    public function setEstPopulaire(int $estPopulaire): self
    {
        $this->estPopulaire = $estPopulaire;

        return $this;
    }

    public function verifieEstPopulaire()
    {
        if($this->getNoteMoyenne() >= 4.00 && $this->getNbNotes() >= 10)
        {
            $this->setEstPopulaire(1);
        }
        else
        {
            $this->setEstPopulaire(0);
        }
    }

}
