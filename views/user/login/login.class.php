<?php
/**
 * Author: Abdul Sankoh
 * Date: 4/25/2023
 * File login.class.php
 * Description:
 */

class Login extends PhotoIndex{
    public function display(){
        parent::displayHeader("Photo Login Page");
        ?>

<div class="top-row">Login</div>
        <div class="middle-row">
            <p>Please enter your username and password.</p>
            <form method="post" action="<?= BASE_URL ?>/user/verify">
                <div><input type="text" name="username" style="width: 99%" placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Don't have an account? <a href="<?=BASE_URL?>/user/index">Register</a></span>
            <span style="float: right"></span>
        </div>

<?php

parent::displayFooter();

}
}