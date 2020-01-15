<?php

namespace App\Domain\BDTendanceHome;

class BDTendanceHomeQuery
{
    public $genre;

    public function __construct($genre)
    {
        $this->genre = $genre;
    }
}