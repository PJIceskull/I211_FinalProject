<?php
/*
 * Author: Abdul Sankoh
 * Date: 03-05-2023
 * File: photogallery_view.class.php
 * Description: This class defines a method called "display", which displays all movies.
 */

class PhotoView extends PhotoIndex {
    public function display($photos) {
    parent::displayHeader("Photogallery");
        ?>

        <h2>Photos Available In Our Gallery: </h2>

            <?php

            if ($photos === 0) {
                echo "No Photos were found.<br><br><br><br><br>";
            } else {
                //display photos
                foreach ($photos as $photo) {
                    $id = $photo->getPhotoId();
                    $name = $photo->getName();
                    $image = $photo->getImageURL();
                    $price = $photo->getPrice();
                    $description = $photo->getDescription();
                    if (strpos($image, "http://") === false and strpos($image, "https://") === false) {
                        $image = BASE_URL . "/". PHOTO_IMG . $image;
                    }
                    echo "<div class='item'><p><a href='", BASE_URL, "/photo/detail/$id'><img src='" . $image .
                        "'></a><span>$name<br>Description: $description<br>" . "<br>Price: $price</br>". "</span></p></div>";

                }
            }


            ?>

        <?php
        //display page footer
        parent::displayFooter();
    } //end of display method
} // end of Photo View class