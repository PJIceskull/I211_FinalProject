<?php
/**
 * Author: Pierce Issah
 * Date: 4/13/2023
 * File: photo_edit.class.php
 * Description: Define Photo Edit Class for changing data on Details page
 */
class PhotoEdit extends PhotoIndex {
    public function display($photo) {
        // Display Header
        parent::displayHeader("Photogallery");

        //retrieve photo details by calling get methods
        $id = $photo->getPhotoId();
        $name = $photo->getName();
        $image = $photo->getImageURL();
        $price = $photo->getPrice();
        $description = $photo->getDescription();
?>
        <div id="main-header">Edit Movie Details</div>

        <!-- display movie details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/photo/update/" . $id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $id ?>">
<!--            Name of Photo-->
            <p><strong>Photo Name</strong><br>
                <input name="name" type="text" size="100" value="<?= $name ?>" required autofocus></p>
            </p>
<!--            Image Url-->
            <p><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="<?= $image ?>">
            </p>
<!--            Description -->
            <p><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="100"><?= $description ?></textarea>
            </p>
<!--            Prices-->
            <p><strong>Price</strong>: <input name="price" type="number" value="<?= $price ?>" required=""></p>
<!--            Buttons -->
            <input type="submit" name="action" value="Update Photo">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/photo/detail/" . $id ?>"'>
        </form>
<?php
        // Display Footer
        parent::displayFooter();
    }
}