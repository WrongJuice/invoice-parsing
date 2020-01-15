<?php

namespace App\Tests;

use App\Domain\BDDetail\BDDetailHandler;
use App\Domain\BDDetail\BDDetailQuery;
use PHPUnit\Framework\TestCase;

class BDDetailTest extends TestCase
{

    public function testDemanderBDDetailAppelRepository($id)
    {


        $Repository = $this->createMock(\App\Repository\BandeDessineeRepository::class);
        $Repository->expects($this->once())->method('__construct');
        $Query = new BDDetailQuery($id);
        $Handler = new BDDetailHandler($Repository);

        $Handler->handle($Query);

        $repository = $this->getDoctrine()->getRepository('App\Entity\BandeDessinee');

    }

}
