<?php

namespace App\Domain\BDDetail;

class BDDetailQuery
{
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
}