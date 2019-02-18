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

        if (! $request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        // validate require props
        if (! $request->get('name')) {
            return $this->respondValidationError('Please provide a name!');
        }

        if (! $request->get('description')) {
            return $this->respondValidationError('Please provide a description!');
        }

        if (! $request->get('category')) {
            return $this->respondValidationError('Please provide a category!');
        }

        // persist the new subCategory
        $subCategory = new SubCategory;
        $subCategory->setName($request->get('name'));
        $subCategory->setDescription($request->get('description'));
        $subCategory->setCategory($request->get('category'));


        $em->persist($subCategory);
        $em->flush();

        return $this->respondCreated($subCategoryRepository->transform($subCategory));
    }
}