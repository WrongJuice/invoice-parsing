<?php

namespace App\Domain\BDTendance;

class BDTendanceQuery
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