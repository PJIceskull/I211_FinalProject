<?php
/*
 * Author: Louie Zhu
 * Date: 11/05/2021
 * Name: login.class.php
 * Description: This class defines a method "display" that displays a login confirmation message.
 */
class Verify extends PhotoIndex {

    public function display($result) {
        parent::displayHeader("Verify Page");
        ?>

        <div class="top-row">Verified</div>
        <div class="middle-row">
            <?php
            if ($result === false) {
            echo "Password was incorrect";
            } else{
                echo 'Hi! ', $_COOKIE["user"], ', You have successfully logged in.';
                echo "<br> <a href='". BASE_URL."/welcome/index'>Back to Home Page?</a>";

            }
            ?>
        </div>
        <div class="bottom-row">
            <span style="float: left">
                <?php
                if ($result === true) { //if the user has logged in, display the logout button
                    echo "Already have an account? <a href='". BASE_URL."/user/login'>Login</a>";
                } else {
                    //if the user has not logged in, display the login button
                    echo "Want to log out? <a href='". BASE_URL."/user/logout'>Logout</a>";
                }
                ?>
            </span>
            <span style="float: right">Reset password? <a href="<?= BASE_URL ?>/user/reset">Reset</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
