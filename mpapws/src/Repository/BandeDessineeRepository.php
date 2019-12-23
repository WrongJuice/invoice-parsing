<?php

namespace App\Repository;

use App\Entity\BandeDessinee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method BandeDessinee|null find($id, $lockMode = null, $lockVersion = null)
 * @method BandeDessinee|null findOneBy(array $criteria, array $orderBy = null)
 * @method BandeDessinee[]    findAll()
 * @method BandeDessinee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BandeDessineeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BandeDessinee::class);
    }


    public function getBDRecentesForHome(String $genre)
    {
        /* Récupère les BD sorties il y a moins de deux mois et selon un genre*/

        $twoMonths = new \DateTime(date("Y-m-d H:i:s"));
        $twoMonths->modify('-2 months');

        $QueryBuilder = $this->createQueryBuilder("BD")
            ->andWhere('BD.DateDeParution > :twoMonths')
            ->andWhere('BD.Genre = :genre')
            ->setParameter('twoMonths', $twoMonths)
            ->setParameter('genre', $genre);

        $BandeDessinees = $QueryBuilder->getQuery()->getResult();

        return $BandeDessinees;
    }

    public function getBDRecentesPagination($page, $nbMaxParPage, $genre)
    {
        /* Récupère les BD sorties il y a moins de deux mois et selon un genre*/

        $twoMonths = new \DateTime(date("Y-m-d H:i:s"));
        $twoMonths->modify('-2 months');

        $QueryBuilder = $this->createQueryBuilder("BD")
            ->andWhere('BD.DateDeParution > :twoMonths')
            ->andWhere('BD.Genre = :genre')
            ->setParameter('twoMonths', $twoMonths)
            ->setParameter('genre', $genre);

        $BandeDessinees = $QueryBuilder->getQuery();

        $premierResultat = ($page - 1) * $nbMaxParPage;
        $BandeDessinees->setFirstResult($premierResultat)->setMaxResults($nbMaxParPage);
        $paginator = new Paginator($BandeDessinees);

        if ( ($paginator->count() <= $premierResultat) && $page != 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas.'); // page 404, sauf pour la première page
        }

            return $paginator;
        }

    /**
     * Récupère une liste d'articles triés et paginés pour un genre donné
     *
     * @param int $page Le numéro de la page
     * @param int $nbMaxParPage Nombre maximum d'article par page
     *
     * @throws InvalidArgumentException
     * @throws NotFoundHttpException
     *
     * @return Paginator
     */
    public function getBDGenrePagination($page, $nbMaxParPage, $genre)
    {
        if (!is_numeric($page)) {
            throw new InvalidArgumentException(
                'La valeur de l\'argument $page est incorrecte (valeur : ' . $page . ').'
            );
        }

        if ($page < 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas');
        }

        if (!is_numeric($nbMaxParPage)) {
            throw new InvalidArgumentException(
                'La valeur de l\'argument $nbMaxParPage est incorrecte (valeur : ' . $nbMaxParPage . ').'
            );
        }

        $qb = $this->createQueryBuilder('BD')
            ->where('BD.Genre = :genre')
            ->orderBy('BD.DateDeParution', 'DESC')
            ->setParameter('genre', $genre);

        $query = $qb->getQuery();

        $premierResultat = ($page - 1) * $nbMaxParPage;
        $query->setFirstResult($premierResultat)->setMaxResults($nbMaxParPage);
        $paginator = new Paginator($query);

        if ( ($paginator->count() <= $premierResultat) && $page != 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas.'); // page 404, sauf pour la première page
        }

        return $paginator;
    }

    public function getBDSousGenrePagination($page, $nbMaxParPage, $genre, $sousGenre)
    {
        if (!is_numeric($page)) {
            throw new InvalidArgumentException(
                'La valeur de l\'argument $page est incorrecte (valeur : ' . $page . ').'
            );
        }

        if ($page < 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas');
        }

        if (!is_numeric($nbMaxParPage)) {
            throw new InvalidArgumentException(
                'La valeur de l\'argument $nbMaxParPage est incorrecte (valeur : ' . $nbMaxParPage . ').'
            );
        }

        $qb = $this->createQueryBuilder('BD')
            ->where('BD.Genre = :genre')
            ->andWhere('BD.SousGenre = :sousGenre')
            ->orderBy('BD.DateDeParution', 'DESC')
            ->setParameter('genre', $genre)
            ->setParameter('sousGenre', $sousGenre);

        $query = $qb->getQuery();

        $premierResultat = ($page - 1) * $nbMaxParPage;
        $query->setFirstResult($premierResultat)->setMaxResults($nbMaxParPage);
        $paginator = new Paginator($query);

        if ( ($paginator->count() <= $premierResultat) && $page != 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas.'); // page 404, sauf pour la première page
        }

        return $paginator;
    }
}
