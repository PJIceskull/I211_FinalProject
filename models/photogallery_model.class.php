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
    static private $_instance = NULL;
    private $tblPhotos;
    private $tblCategories;

    public function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblPhotos = $this->db->getPhotos();
        $this->tblCategories = $this->db->getCategories();
    }

    /*
    * this method retrieves all photos from the database and
    * returns an array of photos objects if successful or false if failed.
    */
    public function getPhotos()
    {
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
    public function search_photo($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblPhotos .
            " WHERE 1";

        foreach ($terms as $term) {
            $sql .= " AND name LIKE '%" . $term . "%'";
        }


        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
          return 0;

        //search succeeded, but no photo was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 photo found.
        //create an array to store all the returned photos
        $photos = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $photo = new Photo($obj->photo_id, $obj->Name, $obj->imageURL, $obj->Price, $obj->description);

            //set the id for the photo
//             $photo->setId($obj->photo_id);
            $photo->setPhotoId($obj->photo_id);

            //add the photo into the array
            $photos[] = $photo;
        }
        return $photos;
    }

    public function view_photo($id) {
        try {
            //the select sql statement

            $sql = "SELECT * FROM " . $this->tblPhotos . "," . $this->tblCategories .
                " WHERE " . $this->tblPhotos . ".category_id=" . $this->tblCategories . ".category_id" .
                " AND " . $this->tblPhotos . ".photo_id='$id'";

//        exit($sql);

            $query = $this->dbConnection->query($sql);

            if (!$query) {
                //echo "failed";
                throw new DataMissingException("Missing Photo Fields");
        }

            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                //create a photo object
                $photo = new Photo(null, $obj->Name, $obj->imageURL, $obj->Price, $obj->description);

                //set the id for the photo
                $photo->setPhotoId($obj->photo_id);

                //create a photo object
                //$photo = new Photo(stripslashes($obj->product_name), stripslashes($obj->description), stripslashes($obj->author), stripslashes($obj->price), stripslashes($obj->image) );

                return $photo;
            }
        }catch (DataMissingException $e){
            $view = new PhotoError();
            $view->display($e->getMessage());
            exit();
        }
    }

    public function update_photo($id) {
        try {
            //if the script did not receive post data, display an error message and then terminate the script immediately
            if (!filter_has_var(INPUT_POST, 'name') ||
                !filter_has_var(INPUT_POST, 'imageURL') ||
                !filter_has_var(INPUT_POST, 'price') ||
                !filter_has_var(INPUT_POST, 'description')
            ) {
                throw new DataMissingException("Missing Value for the input field.");
            }

            //retrieve data for the new movie; data are sanitized and escaped for security.
            $name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'name', FILTER_DEFAULT)));
            $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'imageURL', FILTER_DEFAULT)));
            $price = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_DEFAULT)));
            $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_DEFAULT)));
//        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));

            //query string for update
            $sql = "UPDATE " . $this->tblPhotos .
                " SET Name='$name', imageURL='$image', Price=$price, "
                . "description='$description' WHERE photo_id=$id";

            //execute the query
            return $this->dbConnection->query($sql);
        }catch (DataMissingException $e){
            $view = new PhotoError();
            $view->display($e->getMessage());
            exit();
        }
    }

}

