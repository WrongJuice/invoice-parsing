<?php

namespace App\Repository;

use App\Entity\BandeDessinee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

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


    public function getBDRecentes(String $genre)
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



    public function getNoteMoyenne($id)
    {
        /* Une fonction a faire, combinée à getBDRecentes, elle pourrait nous faire gagner enormement de place dans le
        Controller */
    }

    // /**
    //  * @return BandeDessinee[] Returns an array of BandeDessinee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BandeDessinee
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
