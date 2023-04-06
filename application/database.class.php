<?php

/*
* Author: Abdul Sankoh
 * Date: 03-05-2023
 * File: database,class.php
 * Description: the Database class sets the database details.
 *
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'photo_gallery_final',
        'tblPhotos' => 'photos',
        'tblCategories' => 'categories',
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
            $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    public function getPhotos(){
        return $this->param['tblPhotos'];
    }

    public function getCategories(){
        return $this->param['tblCategories'];
    }


}
