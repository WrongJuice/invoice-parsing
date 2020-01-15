<?php

namespace App\Tests;

use App\Domain\BDGenre\BDGenreHandler;
use App\Domain\BDGenre\BDGenreQuery;
use PHPUnit\Framework\TestCase;

class BDGenreTest extends TestCase
{

    public function testDemanderBDGenreAppelRepository()
    {
        $page = 1;
        $nbPage = 5;
        $genre = 'BD';

        $Repository = $this->createMock(\App\Repository\BandeDessineeRepository::class);
        $Repository->expects($this->once())->method('getBDGenrePagination');
        $Query = new BDGenreQuery($page, $nbPage, $genre);
        $Handler = new BDGenreHandler($Repository);

        $Handler->handle($Query);

    }

    public function testLesBDBonGenre()
    {

        $page = 1;
        $nbPage = 5;
        $genre = 'BD';

        $Repository = $this->createMock(\App\Repository\BandeDessineeRepository::class);
        $Repository->expects($this->once())->method('getBDGenrePagination');
        $Query = new BDGenreQuery($page, $nbPage, $genre);
        $Handler = new BDGenreHandler($Repository);

        $bandeDessinees = $Handler->handle($Query); // Récupère les BD Récentes

        $estTrue = true;

        foreach ($bandeDessinees as $bandeDessinee)
        {
            if ($bandeDessinee->getGenre() != 'BD') $estTrue = false;
        }

        self::assertTrue($estTrue);
    }
}
