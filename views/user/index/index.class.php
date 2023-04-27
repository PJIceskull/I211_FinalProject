<?php
/**
 * Author: Abdul Sankoh
 * Date: 4/27/2023
 * File index.class.php
 * Description:
 */
class Index extends PhotoIndex{
public function display() {
    parent::displayHeader("Photo Register Page");
        ?>
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p>Please complete the entire form. All fields are required.</p>
            <form method="post" action="<?=BASE_URL?>/user/register">
                <div><input type="text" name="username" style="width: 99%"  placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%"  placeholder="Password, 5 characters minimum"></div>
                <div><input type="text" name="email" style="width: 99%" placeholder="Email"></div>
                <div><input type = 'text' name="fname" style="width: 99%"  placeholder="First name"></div>
                <div><input type="text" name="lname" style="width: 99%" placeholder="Last name"></div>
                <div><input type="submit" class="button" value="register"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?=BASE_URL?>/user/login">Login</a></span>
            <span style="float: right"></span>
        </div>

    <?php
    parent::displayFooter();
}

}
