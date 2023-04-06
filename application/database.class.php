<?php

/*
 * Author: Jay Dawson II
 * Date: November 17, 2022
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
        'database' => 'photogallery_db',
        'tblCustomers' => 'Customers',
        'tblOrders' => 'Orders',
        'tblOrderDetails' => 'Order_details',
        'tblProducts' => 'Products',
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

    //returns the name of the table that stores Customers
    public function getCustomers() {
        return $this->param['tblCustomers'];
    }

    //returns the name of the table that stores orders
    public function getOrders() {
        return $this->param['tblOrders'];
    }

    //returns the name of the table storing order details
    public function getOrderDetails() {
        return $this->param['tblOrder_details'];
    }

    //returns the name of the table storing products
    public function getProducts() {
        return $this->param['tblProducts'];
    }


}
