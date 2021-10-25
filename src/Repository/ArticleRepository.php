<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
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



    /**
     * Requete qui me permet de recupérer les produits en fonction de l'utilisateur
     *
     * @param Search $search
     * @return Product[]
     */
    public function findWithSearch(Search $search)
    {

        $query = $this
            ->createQueryBuilder('a')  //on créé une construction de requete avec la  table article
            ->select('c', 'a')          //on selectionne categorie et article
            ->join('a.category', 'c');  //on fait une jointure entre les categories (le champ) de l'article et la table category

        if (!empty($search->categories)) { //categories est un propriété de la classe Search

            $query = $query //on reprend la query et...
                ->andWhere('c.id IN (:categories)')  //on passe en parametre categories
                ->setParameter('categories', $search->categories); //on dit a quoi correspond categories, et on donne la valeur
        }

        if (!empty($search->string)) {

            $query = $query
                ->andWhere('a.name LIKE :string')
                ->setParameter('string', "%{$search->string}%");//on fait une recherche partielle sur search->
        }

        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
