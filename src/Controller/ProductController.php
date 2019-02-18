<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class ProductController extends ApiController
{
    /**
     * @Route("/products")
     */
    public function productsAction()
    {
        return $this->respond([
            [
                'Id' => 1,
                'Name' => 'Dumbell 9000',
                'Description' => 'Just when you thought the Dumbell 8999 didn\'t go far enough, the engineers at Universal Fit are proud to present the next evolution in picking things up and putting them down!',
                'Price' => 99.00,
                'Sale Price' => 0.1,
                'Active' => true,
                'On Sale' => true,
                'CategoryOld' => 1,
                'Sub-CategoryOld' => 1,
                'ProductOld Image' => 'http://dummyimage.com/100x100.jpg/cc0000/ffffff'
            ]
        ]);
    }
}