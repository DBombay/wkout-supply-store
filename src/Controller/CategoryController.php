<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CategoryController extends ApiController
{
    /**
     * @Route("/categories", methods="GET")
     */
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->transformAll();

        return $this->respond($categories);
    }

    /**
     * @Route("/categories", methods="POST")
     */
    public function create(Request $request, CategoryRepository $CategoryRepository, EntityManagerInterface $em)
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

        // persist the new category
        $category = new Category;
        $category->setName($request->get('name'));
        $category->setDescription($request->get('description'));


        $em->persist($category);
        $em->flush();

        return $this->respondCreated($CategoryRepository->transform($category));
    }
}