<?php

namespace App\Controller;

use App\Entity\SubCategory;
use App\Repository\SubCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class SubCategoryController extends ApiController
{
    /**
     * @Route("/subcategories", methods="GET")
     */
    public function index(SubCategoryRepository $subCategoryRepository)
    {
        $subCategories = $subCategoryRepository->transformAll();

        return $this->respond($subCategories);
    }

    /**
     * @Route("/subcategories", methods="POST")
     */
    public function create(Request $request, SubCategoryRepository $subCategoryRepository, EntityManagerInterface $em)
    {
        $request = $this->transformJsonBody($request);

        if (!$request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        // validate require props
        if (!$request->get('name')) {
            return $this->respondValidationError('Please provide a name!');
        }

        if (!$request->get('description')) {
            return $this->respondValidationError('Please provide a description!');
        }

        if (!$request->get('category_id')) {
            return $this->respondValidationError('Please provide a category id!');
        }

        // persist the new subCategory
        $subCategory = new SubCategory;
        $subCategory->setName($request->get('name'));
        $subCategory->setDescription($request->get('description'));

        //TODO Fetch a specific category and assign it as the parent of the subcategory
        $category = $em->find('App\\Entity\\Category', $request->get('category_id'));
        $em->persist($subCategory);
        $category->getSubCategories()->addSubCategory($subCategory);
        $em->persist($category);
        $em->flush();

        return $this->respondCreated($subCategoryRepository->transform($subCategory));
    }
}