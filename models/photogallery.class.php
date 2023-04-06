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
    private $id, $name, $imageURL, $description,  $price, $img;

//constructor that initializes photo properties
    public function __construct( $id, $name, $imageURL, $price, $description, $img) {
        $this->id = $id;
        $this->name = $name;
        $this->imageURL = $imageURL;
        $this->price = $price;
        $this->description = $description;
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
        return $this->name;
    }

    /*
     * @return mixed
     */
    public function getImageURL()
    {
        return $this->imageURL;
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
    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->img;
    }

}