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
    private $photo_id, $name, $imageURL, $price, $description;

//constructor that initializes photo properties
    public function __construct( $photo_id, $name,$imageURL, $price,$description) {
        $this->photo_id = $photo_id;
        $this->name = $name;
        $this->imageURL = $imageURL;
        $this->price = $price;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPhotoId()
    {
        return $this->photo_id;
    }

    public function setPhotoId($photo_id){
        $this->photo_id = $photo_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getImageURL()
    {
        return $this->imageURL;
    }


}