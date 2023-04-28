<?php
/*
 * Author: Louie Zhu
 * Date: 11/05/2021
 * Name: login.class.php
 * Description: This class defines a method "display" that displays a logout message.
 */

class Logout extends PhotoIndex {

    public function display() {
        parent::displayHeader("Logout Page");
        ?>
        <div class="top-row">Logout</div>
        <div class="middle-row">
            <p>You have successfully logged out.</p>
            <a href="<?= BASE_URL ?>/welcome/index">Back to Home Page?</a>
        </div>
        <div class="bottom-row">
                 <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
                <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>

        </div>

        <?php
        parent::displayFooter();
    }

}
