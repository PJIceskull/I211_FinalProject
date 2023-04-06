<?php
/**
 * Name: Jay Dawson II
 * Date: 11/17/22
 * File:photoerror.class.php
 * Description:
 */



class PhotoError {

    public function display($message) {

        // display Header
        parent::displayHeader("Error");
        ?>
        <div id="main-header"></div>
        <div><?= urldecode($message) ?></div>
        <br><br><br>
        <a href="<?= BASE_URL ?>/photo/index">Back to Homepage</a>
        <?php

        parent::displayFooter();
    }

}