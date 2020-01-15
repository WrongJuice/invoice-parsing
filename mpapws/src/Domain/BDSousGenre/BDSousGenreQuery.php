<?php

namespace App\Domain\BDSousGenre;

class BDSousGenreQuery
{
    public $page;
    public $nbPage;
    public $genre;
    public $sousGenre;

    public function __construct($page, $nbPage, $genre, $sousGenre)
    {
        $this->page = $page;
        $this->nbPage = $nbPage;
        $this->genre = $genre;
        $this->sousGenre = $sousGenre;
    }
}