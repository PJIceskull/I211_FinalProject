<?php
/**
 * Author: Abdul Sankoh
 * Date: 4/26/2023
 * File index.class.php
 * Description:
 */

class Register extends PhotoIndex{
    public function display($result){
        parent::displayHeader("Photo Registration Page");
        ?>

        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p><?= $result ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?=BASE_URL?>/user/login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="<?=BASE_URL?>/user/index">Register</a></span>
        </div>



<?php
        parent::displayFooter();
    }
}