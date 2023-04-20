<?php
/**
 * Author: Pierce Issah
 * Date: 4/11/2023
 * File: photo_search.class.php
 * Description: Define PhotoSearch Class
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
        <span class="">
            <?php
            echo ((!is_array($photos)) ? "( 0 - 0 )" : "( 1 - " . count($photos) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($photos === 0) {
                echo "No Photo was found.<br><br><br><br><br>";
            } else {
                //display movies in a grid; six movies per row
                foreach ($photos as $photo) {
                    $id = $photo->getPhotoId();
                    $name = $photo->getName();
                    $image = $photo->getImageURL();
                    $price = $photo->getPrice();
                    $description = $photo->getDescription();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . PHOTO_IMG . $image;
                    }

                    echo "<div class='item'><p><a href='" . BASE_URL . "/photo/detail/$id'><img src='" . $image .
                        "'></a> <span>$name<br> Description: $description</br>" . "<br>Price: $price</br>" . "</span></p></div>";

                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>">Go to Photo Gallery</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}