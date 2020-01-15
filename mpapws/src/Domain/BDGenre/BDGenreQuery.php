<?php

namespace App\Domain\BDGenre;

class BDGenreQuery
{
    public $page;
    public $nbPage;
    public $genre;

    public function __construct($page, $nbPage, $genre)
    {
        $this->page = $page;
        $this->nbPage = $nbPage;
        $this->genre = $genre;
    }
}