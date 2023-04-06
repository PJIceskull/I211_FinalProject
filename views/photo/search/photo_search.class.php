<?php
/*
 * Author: Layla Mitiche
 * Date: 12/1/22
 * Name: photo_search.class.php

 */

class PhotoSearch extends PhotoIndex {
    /*
     * the displays accepts an array of photo objects and displays
     * them in a grid.
     */

    public function display($terms, $photos) {
        //display page header

        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($photos)) ? "( 0 - 0 )" : "( 1 - " . count($photos) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($photos === 0) {
                echo "No photo was found.<br><br><br><br><br>";
            } else {
                //display photos in a grid;
                foreach ($photos as $photo) {
                    $id = $photo->getId();
                    $name = $photo->getName();
                    $description = $photo->getDescription();
                    $imageURL = $photo->getImageURL();
                    $price = $photo->getPrice();
                    $image = $photo->getImageURL();

                    if (strpos($image, "http://") === false and strpos($image, "https://") === false) {
                        $image = IMG_URL . PHOTO_IMG . $image;
                    }

                    echo "<div class='item'><p><a href='" . BASE_URL . "/photo/detail/$id'><img src='$image'></a><span>$name<br>Description: $description<br>" . " URL: $imageURL<br>". " Price: $price<br>"."</span></p></div>";

                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/photo/index">Go to photo gallery list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}