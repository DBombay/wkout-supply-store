<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ProductController extends ApiController
{
//    /**
//     * @Route("/products")
//     */
//    public function productsAction()
//    {
//        return $this->respond([
//            [
//                'Id' => 1,
//                'Name' => 'Dumbbell 9000',
//                'Description' => 'Just when you thought the Dumbbell 8999 didn\'t go far enough, the engineers at Universal Fit are proud to present the next evolution in picking things up and putting them down!',
//                'Price' => 99.00,
//                'Sale Price' => 0.1,
//                'Active' => true,
//                'On Sale' => true,
//                'CategoryOld' => 1,
//                'Sub-CategoryOld' => 1,
//                'ProductOld Image' => 'http://dummyimage.com/100x100.jpg/cc0000/ffffff'
//            ]
//        ]);
//    }

    /**
     * @Route("/products", methods="GET")
     */
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->transformAll();

        return $this->respond($products);
    }

    /**
     * @Route("/products", methods="POST")
     */
    public function create(Request $request, ProductRepository $productRepository, EntityManagerInterface $em)
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

        if (! $request->get('price')) {
            return $this->respondValidationError('Please provide a price!');
        }

        if (! $request->get('salePrice')) {
            return $this->respondValidationError('Please provide a Sale Price!');
        }

        if (! $request->get('active')) {
            return $this->respondValidationError('Please confirm if this item is active!');
        }

        if (! $request->get('onSale')) {
            return $this->respondValidationError('Please confirm if this item is on sale!');
        }

        if (! $request->get('productImage')) {
            return $this->respondValidationError('Please provide an image for this product!');
        }

        if (! $request->get('category')) {
            return $this->respondValidationError('Please provide a category!');
        }

        if (! $request->get('subCategory')) {
            return $this->respondValidationError('Please provide a sub-Category!');
        }

        // persist the new product
        $product = new Product;
        $product->setName($request->get('name'));
        $product->setDescription($request->get('description'));
        $product->setPrice($request->get('price'));
        $product->setSalePrice($request->get('salePrice'));
        $product->setActive($request->get('active'));
        $product->setOnSale($request->get('onSale'));
        $product->setProductImage($request->get('productImage'));
        $product->setSubCategory($request->get('subCategory'));
        $product->setCategory($request->get('category'));

        $em->persist($product);
        $em->flush();

        return $this->respondCreated($productRepository->transform($product));
    }
}