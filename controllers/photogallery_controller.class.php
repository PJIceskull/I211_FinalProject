<?php

/*
 * Author: Pierce Issah
 * Date: 03-05-2023
 * File: photogallery_controller.class.php
 * Description: the photo controller
 *
 */

class PhotoController {

    private $photo_model;

    //default constructor
    public function __construct() {
        //create an instance of the PhotoModel class
        $this->photo_model = new PhotoModel();
    }

    //index action that displays all photos
    public function index() {
        //retrieve all photos and store them in an array
        $photos = $this->photo_model->getPhotos();

        if (!$photos) {
            //display an error
            $message = "There was a problem displaying the photos.";
            $this->error($message);
            return;
        }

        // display all photography products
        $view = new PhotoView();
        $view->display($photos);
    }

    //show details of a photograph product
    public function detail($id) {
        //retrieve the specific photograph

        $photos = $this->photo_model->view_photo($id);
//        var_dump($photos);
//        exit();

        if (!$photos) {
            //display an error
            $message = "There was a problem displaying the photo id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display photo details
        $view = new PhotoDetail();
        $view->display($photos);
    }

    // Edit & Update Method
    // Insert Edit
    // Display Photo in a form for editing
    public function edit($id) {
        //retrieve the specific movie
        $photo = $this->photo_model->view_photo($id);

        if (!$photo) {
            //display an error
            $message = "There was a problem displaying the photo id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new PhotoEdit();
        $view->display($photo);
    }

    // Update Photo in the database
    public function update($id) {
        //update the photo
        $update = $this->photo_model->update_photo($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the photo id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display the updated movie details
        $confirm = "The photo was successfully updated.";
        $photo = $this->photo_model->view_photo($id);

        $view = new PhotoDetail();
        $view->display($photo, $confirm);
    }


    //search photos
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all photos
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching photos
        $photos = $this->photo_model->search_photo($query_terms);

        if ($photos === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched photos
        $search = new PhotoSearch();
        $search->display($query_terms, $photos);
    }


    //search the database for photos that match words in titles. Return an array of photos if successful; false otherwise.
    public function search_photo($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblPhotos ."," .$this->tblOrder_details.
            " WHERE " . $this->tblPhotos . ".photo_name=" . $this->tblOrder_details . ".photo_id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND photo_name LIKE '%" . $term . "%'";
        }

        $sql .= ")";

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
            $photo = new Photo($obj->Name,  $obj->imageURL, $obj->Price, $obj->description, $obj->img);

            //set the id for the photo
//            $photo->setId($obj->id);
            $photo->setPhotoId($obj->photo_id);

            //add the photo into the array
            $photos[] = $photo;
        }
        return $photos;
    }

    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $photos = $this->photo_model->search_photo($query_terms);

        //retrieve all movie titles and store them in an array
        $titles = array();
        if ($photos) {
            foreach ($photos as $photo) {
                $titles[] = $photo->getName();
            }
        }

        echo json_encode($titles);
    }


    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new PhotoError();

        //display the error page
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {

        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

}
