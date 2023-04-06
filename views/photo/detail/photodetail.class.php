<?php
/**
 * Name: Jay Dawson II
 * Date: 11/17/22
 * File:photodetail.class.php
 * Description:
 */



class PhotoDetail extends PhotoIndex {

    public function display($photo, $confirm = "") {
        //display page header
        parent::displayHeader("Photo Details");

        //retrieve photo details by calling get methods
        $id = $photo->getId();
        $name = $photo->getName();
        $description = $photo->getDescription();
        $imageURL = $photo->getImageURL();
        $price = $photo->getPrice();
        $image = $photo->getImageURL();
        if (strpos($image, "http://") === false and strpos($image, "https://") === false) {
            $image = BASE_URL . "/" . PHOTO_IMG . $image;
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
                <td style="width: 130px;">
                    <p><strong>Product Name:</strong></p>
                    <p><strong>Description:</strong></p>
                    <p><strong>Author:</strong></p>
                    <p><strong>Price:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/photo/edit/<?= $id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p><?= $name ?></p>
                    <p><?= $description ?></p>
                    <p><?= $imageURL ?></p>
                    <p><?= $price ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/photo/index">Go to photo list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}