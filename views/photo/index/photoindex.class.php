<?php


class PhotoIndex {
//this method displays the page header
    static public function displayHeader($page_title) {


        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>

            <link type='text/css' rel='stylesheet' href='<?= IMG_URL ?>/www/css/photogallerystyle.css' />
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <div id="top"></div>
        <div id="banner">
            <nav>
                <a href="<?= BASE_URL ?>/welcome/index">HOME</a>
                <a href="<?= BASE_URL ?>/photo/index">PHOTO</a>
                <a href="#">ABOUT</a>
                <a href="<?= BASE_URL ?>/login/">LOGIN</a>
            </nav>
        <div id="heroContent">
            <h5> Aquatic Photo Gallery <h5/>
                <div style='color: #000; font-size: 14pt; font-weight: bold'>Take a look at what we have!</div>
        </div>
        </div>

       <!-- <div id='wrapper'>
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/photo/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search photos by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div> -->

        <?php
    }//end of displayHeader function


    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <br><br><br>
        <div id="push"></div>
        </div>
        <div id="footer"><br>&copy 2022 Indy Photo Gallery. All Rights Reserved.</div>
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}