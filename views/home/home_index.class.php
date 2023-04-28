<?php
/**
 * Author: Abdul Sankoh
 * Date: 4/20/2023
 * File home_index.class.php
 * Description:
 */

class Home extends PhotoIndex{

public function display(){
     parent::displayHeader("Home Page")
?>

    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link type='text/css' rel='stylesheet' href='<?= IMG_URL ?>/www/css/photogallerystyle.css' />
    <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js">
        var base_url = "<?= BASE_URL ?>";
    </script>


</head>
<body>


<div id="about">

    <div class="flex-container">
        <div class="boxOne">
            <i class="fa-solid fa-camera-retro"></i>
            <h3>High Quailty Images</h3>
            <p>The images we gather are always the highest quailty for the customers!</p>
        </div>

        <div class="boxTwo">
            <i class="fa-solid fa-wrench"></i>
            <h3>Worldwide</h3>
            <p>These images are taken from all around the globe. Providing a variety of aquatic images to please the viewers. </p>
        </div>

        <div class="boxThree">
            <i class="fa-solid fa-user-group"></i>
            <h3>Reilable</h3>
            <p>We are a Trustworthy Reputable Business providing high quality images for the viewers to see.</p>
        </div>
    </div>
</div>

</body>
<?php

    parent::displayFooter();
}
}