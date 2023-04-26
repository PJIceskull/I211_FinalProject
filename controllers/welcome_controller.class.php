<?php
/*
* Author: Pierce Issah
 * Date: 03-05-2023
 * File: welcome_controller.class.php
 * Description: This scripts define the class for the home controller; this is the default controller.
 *
 */

class WelcomeController {
    //put your code here
    public function index() {
        $view = new Home();
        $view->display();
    }
}