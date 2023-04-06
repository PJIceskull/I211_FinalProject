<?php

/*
 * Author: Jay Dawson II
 * Date: 03-05-2023
 * Name: photogallery.class.php
 * Description:
 */

class Photo
{
//properties of a Photo object
    private $id, $product_name, $description, $author,  $price, $img;

//constructor that initializes photo properties
    public function __construct( $id, $product_name, $desc, $author, $price, $img) {
        $this->id = $id;
        $this->product_name = $product_name;
        $this->description = $desc;
        $this->author = $author;
        $this->price = $price;
        $this->img = $img;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    /*
     * @return mixed
     */
    public function getName()
    {
        return $this->product_name;
    }

    /*
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /*
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /*
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->img;
    }

}