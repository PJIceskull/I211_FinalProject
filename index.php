<?php
/*
 * Author: Jay Dawson II
 * Date: 03-05-2023
 * Name: index.php
 * Description: The homepage
 */
//load application settings
require_once("application/config.php");

//load autoloader
require_once("vendor/autoload.php");


$user_controller = new UserController();

//load the dispatcher that dissects a request URL
new Dispatcher();

