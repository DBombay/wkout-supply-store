<?php

namespace App\Entity;

class Product
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /** @Column(type="string", unique="true", nullable="false" ) */
}