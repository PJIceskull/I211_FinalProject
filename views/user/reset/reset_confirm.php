<?php
/*
 * Author: Louie Zhu
 * Date: 11/05/2021
 * Name: login.class.php
 * Description: This class defines a method "display" that confirms the password reset.
 */

class ResetConfirm extends PhotoIndex {

    public function display($result) {
        parent::displayHeader("Reset Complete");
        ?>

        <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p>Hey, <?= $_COOKIE["user"]?>! Your password has been successfully reset.
                    <a href="<?= BASE_URL ?>/welcome/index">Back to Home Page</a></p>
            <?php
            if ($result === false) {
                echo "Password length is less than 5 characters";
            }
            ?>        </div>
        <div class="bottom-row">         
            <span style="float: left">
                <?php
                if (strpos($result, "successful") == true) { //display the logout button
                    echo "Want to log out? <a href='". BASE_URL."/user/logout'>Logout</a>";
                } else { //display the reset button
                    echo "Reset password? <a href='". BASE_URL."/user/logout'>Reset</a>";
                }
                ?>
            </span>
            <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
