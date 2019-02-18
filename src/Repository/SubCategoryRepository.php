<?php

namespace App\Repository;

use App\Entity\SubCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SubCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubCategory[]    findAll()
 * @method SubCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SubCategory::class);
    }

    // /**
    //  * @return SubCategory[] Returns an array of SubCategory objects
    //  */

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySomeField($value): ?SubCategory
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function transform(SubCategory $subCategory)
    {
        return [
            'id'    => (int) $subCategory->getId(),
            'name' => (string) $subCategory->getName(),
            'description' => (string) $subCategory->getDescription(),
            'category' => (int) $subCategory->getCategory(),
        ];
    }

    public function transformAll()
    {
        $subCategories = $this->findAll();
        $subCategoriesArray = [];

        foreach ($subCategories as $subCategory) {
            $subCategoriesArray[] = $this->transform($subCategory);
        }

        return $subCategoriesArray;
    }
}
