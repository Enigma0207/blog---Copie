<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

//    /**
//     * @return Article[] Returns an array of Article objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Article
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }


// / cette méthode, nous utilisons createQueryBuilder pour créer une requête qui sélectionne les articles dont l'utilisateur (user) correspond à l'ID de 
// l'utilisateur fourni ($userId). La méthode getResult exécute la requête et renvoie les résultats.
// Dans cette méthode, nous utilisons createQueryBuilder pour créer une requête qui sélectionne les articles dont l'utilisateur (user) correspond à l'ID de l'utilisateur fourni ($userId).
//  La méthode getResult exécute la requête et renvoie les résultats.
   
     public function findArticlesByUser($userId)
{
    return $this->createQueryBuilder('a')
        // ->innerJoin('a.auteur = :userId')
        // ->where('u.username = :username')
        //  ->setParameter('username', $username)
        //  ->getQuery()
        // ->getResult();
        ->where('a.auteur = :userId')
        ->setParameter('userId', $userId)
        ->getQuery()
        ->getResult();
}

}
