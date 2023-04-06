<?php

/*
 * Author: Jay Dawson II
 * Date: 03-05-2023
 * File: photogallery_model.class.php
 * Description: the photogallery model
 *
 */

class PhotoModel
{
    private $db; //database object
    private $dbConnection; //database connection object
    private $tblPhotos;
    private $tblCategories;

    public function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblPhotos = $this->db->getPhotos();
        $this->tblCategories = $this->db->getCategories();
    }

    /*
    * this method retrieves all photos from the database and
    * returns an array of photos objects if successful or false if failed.
    */
    public function getPhotos() {
        //SQL select statement
        $sql = "SELECT * FROM " . $this->db->getPhotos();

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all photos
            $photos = array();

            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                $photosNew = new Photo($query_row["photo_id"],
                    $query_row["Name"],
                    $query_row["imageURL"],
                    $query_row["Price"],
                    $query_row["description"],
                    $query_row["category_id"]);

                //push the photos into the array
                $photos[] = $photosNew;
            }
            return $photos;
        }
        return false;
    }
    //search the database for photos that match words in titles. Return an array of photos if successful; false otherwise.
    public function search_photo($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblProducts .
            " WHERE 1";

    foreach ($terms as $term) {
            $sql .= " AND product_name LIKE '%" . $term . "%'";
        }



        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            throw new DataMissingException(
                "Database exclusion failed. ");

        //search succeeded, but no photo was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 photo found.
        //create an array to store all the returned photos
        $photos = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $photo = new Photo($obj->product_id, $obj->product_name, $obj->description, $obj->author, $obj->price, $obj->img);

            //set the id for the photo
           // $photo->setId($obj->product_id);

            //add the photo into the array
            $photos[] = $photo;
        }

        return $photos;

    }

    public function view_photo($id)
    {
        //the select sql statement

        $sql = "SELECT * FROM " . $this->tblProducts ."," .$this->tblOrder_details.
            " WHERE " . $this->tblProducts . ".product_id=" . $this->tblOrder_details . ".product_id" .
        " AND " . $this->tblProducts . " .product_id='$id'";

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            echo "failed";
        }

            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                //create a photo object
                $photo = new Photo(null,$obj->product_name, $obj->description, $obj->author, $obj->price, $obj->img);

                //set the id for the product
                $photo->setId($obj->id);

                //create a photo object
                //$photo = new Photo(stripslashes($obj->product_name), stripslashes($obj->description), stripslashes($obj->author), stripslashes($obj->price), stripslashes($obj->image) );





                return $photo;
            }


    }


}

