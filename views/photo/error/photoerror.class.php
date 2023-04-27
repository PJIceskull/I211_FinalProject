<?php
/**
 * Author: Pierce Issah
 * Date: 4/11/2023
 * File: photoerror.class.php
 * Description: Define Photo Error Class
 */

class PhotoError extends PhotoIndex {

    public function display($message) {

        //display page header
        parent::displayHeader("Error");
        ?>

        <div id="main-header">Error</div>
        <hr>
        <br>
        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; max-width:300px">
                    <img src='<?= BASE_URL ?>/www/img/error.jpg' style="  border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3> Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?= urldecode($message) ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br>
        <hr>
        <a href="<?= BASE_URL ?>/photo/index">Back to photo list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

}