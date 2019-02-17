<?php

namespace App\Entity;

class SubCategory
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /** @Column(type="string", unique="true", nullable="false" ) */
    private $name;
    /** @Column(type="string", unique="true", nullable="false" ) */
    private $description;

    /**
     * @OneToMany(targetEntity="Products")
     * @JoinColumn
     */
    private $product;
}