<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\FantasyTeam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FantasyTeam|null find($id, $lockMode = null, $lockVersion = null)
 * @method FantasyTeam|null findOneBy(array $criteria, array $orderBy = null)
 * @method FantasyTeam[]    findAll()
 * @method FantasyTeam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FantasyTeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FantasyTeam::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FantasyTeam $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Requête qui récupère les équipes fantasy en fonction de la recherche
     * @return FantasyTeam[]
     */
    public function findWithSearch(Search $search){
        $query = $this
        ->createQueryBuilder('e')
        //équipe
        ->select('e');

        if(!empty($search->string)){
            $query = $query
                //est ce que le nom ressemble à ma recherche(->string :string)
                ->andWhere('e.name LIKE :string')
                ->setParameter('string', "%{$search->string}%");
        }
            return $query->getQuery()->getResult();
    }
    
    
    
    

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(FantasyTeam $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FantasyTeam[] Returns an array of FantasyTeam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FantasyTeam
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
