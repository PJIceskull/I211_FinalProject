<?php

class PhotoDetail extends PhotoIndex {

    public function display($photo, $confirm = "") {
        //display page header
        parent::displayHeader("Photo Details");

        //retrieve photo details by calling get methods
        $id = $photo->getPhotoId();
        $name = $photo->getName();
        $image = $photo->getImageURL();
        $price = $photo->getPrice();
        $description = $photo->getDescription();
        if (strpos($image, "http://") === false and strpos($image, "https://") === false) {
            $image = BASE_URL . "/". PHOTO_IMG . $image;
        }
        ?>

        <div id="main-header">Photo Details</div>
        <hr>
        <!-- display product details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $name ?>" />
                </td>
<!--                Table data to hold image url -->
<!--                <td>-->
<!--                    <p>--><?//= $image ?><!--</p>-->
<!--                </td>-->
                <td style="width: 130px;">
                    <p><strong>Name:</strong></p>
                    <p><strong>Description:</strong></p>
                    <p><strong>Price:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/photo/edit/<?= $id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p><?= $name ?></p>
                    <p><?= $description ?></p>
                    <p><?= $price ?></p>

                </td>
<!--                Table data to hold confirm data-->
                <td>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>">Go to photo list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}