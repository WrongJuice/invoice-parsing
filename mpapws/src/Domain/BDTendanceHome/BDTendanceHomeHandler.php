<?php

namespace App\Domain\BDTendanceHome;


use App\Repository\BandeDessineeRepository;

class BDTendanceHomeHandler
{

    private $repository;

    /**
     * BDTendanceHandler constructor.
     */
    public function __construct(BandeDessineeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(BDTendanceHomeQuery $Query) : ?iterable
    {
        return $this->repository->getBDTendancesForHome($Query->genre);
    }
}