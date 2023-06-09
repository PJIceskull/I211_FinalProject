<?php
/*
 * Author: Louie Zhu
 * Date: 11/05/2021
 * Name: login.class.php
 * Description: This class defines a method "display" that displays a reset password form.
 */

class Reset extends PhotoIndex {

    public function display($user) {
        parent::displayHeader("Reset Password Page");
        ?>

        <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p>Please enter a new password. Username is not changeable.</p>
            <form method="post" action="<?= BASE_URL ?>/user/do_reset">
                <div><input type="text" name="username" style="width: 99%" value="<?= $user ?>" readonly="readonly"></div>
                <div><input type="password" name="password" style="width: 99%;" placeholder="Password, 5 characters minimum"></div>
                <div><input type="submit" class="button" value="Reset Password"></div>
            </form>
        </div>
        <div class="bottom-row">         
            <span style="float: left">Cancel password reset? <a href="<?= BASE_URL ?>/user/login">Cancel Reset</a></span>
            <span style="float: right"></span>
        </div>

        <?php
        parent::displayFooter();
    }

}
