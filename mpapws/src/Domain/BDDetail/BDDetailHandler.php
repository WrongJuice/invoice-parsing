<?php

namespace App\Domain\BDDetail;


use App\Repository\BandeDessineeRepository;

class BDDetailHandler
{

    private $repository;

    /**
     * BDDetailHandler constructor.
     */
    public function __construct(BandeDessineeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(BDDetailQuery $Query)
    {
        return $this->repository->find($Query->id);
    }
}