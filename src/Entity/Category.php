<?php

namespace App\Entity;

class Category
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
     * @OneToMany(targetEntity="SubCategory")
     * @JoinColumn(name="SubCategory_id", referencedColumnName="id")
     */
    private $subcategory;

    /**
     * @OneToMany(targetEntity="Products")
     * @JoinColumn(name="Product_id", referencedColumnName="id")
     */
    private $product;
}