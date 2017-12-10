<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project1</title>
    <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css">
    <script src="./libs/Popper/Popper.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
    <!-- !!! mano CSS visada zemiau -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/script.js" defer></script>
    <script src="./js/script-carousel.js" defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel = "stylesheet" href = "./css/material.grey-purple.min.css">
    <link rel = "stylesheet" href = "./css/set2.css">
    <link rel = "stylesheet" href = "./libs/font-awesome-4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>

<body>
<?php
include_once ('./php/database_functions.php');
?>
    <div class="container-fluid np" id="labas">
        <div id="divForIframe">
            <svg id="music-cross-button" height="2em" width="2em"><line x1="0" y1="0" x2="100%" y2="100%" style="stroke:#FE01E7;stroke-width:6"></line><line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#FE01E7;stroke-width:6"></line></svg>
        </div>

        <header class="mdl-grid au-10">

    <!-- ==================HEADER============= -->
            <div class="mdl-cell mdl-cell--12-col nm" >
                <div id="draggable" class="draggable">
                    <img class="debesis" id="deb" src="./images/cloud.png" alt="">
                    <img class="lietus" id="lie" src="./images/rain-cropped-sm.gif" alt="">
                </div>

    <!-- ==================HEADERIO LINKAI==================-->
                    <div class="logo-links">
                        <a href="https://www.discogs.com/artist/1032357-Sraunus" target="_blank"><img class="header-logo ml-1" src="./images/discogs-logo.png" alt="sraunus-soundcloud-logo"></a>
                        <a href="https://soundcloud.com/sraunus" target="_blank"><img class="header-logo ml-1" src="./images/soundcloud-logo.png" alt="sraunus-soundcloud-logo"></a>
                        <a href="https://www.facebook.com/sraunus/" target="_blank"><img class="header-logo ml-1" src="./images/facebook-logo.png" alt="sraunus-soundcloud-logo"></a>
                    </div>
                    <div class="list-group mr-5 text-center tablet-menu" id="font-edit">
                        <a href="#" class="sideLinks " nrl="link1">ABOUT</a>
                        <a href="#" class="sideLinks " nrl="link2">MUSIC</a>
                        <a href="#" class="sideLinks " nrl="link3">GALLERY</a>
                        <a href="#" class="sideLinks " nrl="link4">CONTACTS</a>
                    </div>
    <!-- ==================HEADERIO LINKAI END==================-->
            </div>
        </header>
    <!-- </div> -->
                <!-- ======end of header======== -->

                <!-- =======start of wrapper ====== -->
    <!-- <div class="container-fluid"> -->

                <!-- ======= start of MAIN ======= -->
         <!-- <img id="cloud"  src="./images/cloud.png" alt="sraunus-logo"> -->
        <div class="mdl-grid mt-4">
                <!-- ======= NENAUDOJAMAS DIV ======= -->
            <div class="mdl-cell mdl-cell--2-col">

            </div>
    <!-- <<<==========================START OF MAIN WINDOWS =========================>>> -->

            <main  class="mdl-cell mdl-cell--7-col au-70 nm main-windows-formation">

    <!-- <<<==========================ABOUT DIV WINDOW===============================>>> -->

                <div class="mainWindows about-formation" nrw="link1">
                    <!-- <h1 class="op-1 text-center">Window About</h1> -->
                    <h2 class="text-center h2-color">Sraunus</h2>
                    <img class="profile-picture" src="./images/sraunus_bw.jpg" alt="Paulius-profile">
                    <p class="text-formation">
                        <?php
                        $article = getArticle ($connection, 1);
                        echo $article['article'];
                        ?>
                    </p>

                </div>
    <!-- <<<==========================MUSIC DIV WINDOW===============================>>> -->

                <div class="mainWindows pad-music music-formating text-center music-padding" nrw="link2" id="musicWindow">
                    <?php $result = getAlbumLinks ($connection);
                    foreach ($result as $value) {?>
                        <img class="art alb-img-format" linkid="" src="<?php echo $value['artLinks'] ?>" alt="">
                    <?php } ?>
                </div>

    <!-- <<<==========================GALLERY DIV WINDOW===============================>>> -->
    <div class="mainWindows gallery-formating" nrw="link3" id="photoGallery">
        <?php for ($i=1; $i <= 38; $i++) {?>
            <a href="#?photoID=<?php echo $i ?>" class="photo-links"><img class="thumb" src="./images/Reduced gallery/Image_Thumbnails/<?php echo $i?>.jpg" alt=""></a>
        <?php }; ?>
    <!-- <<<==========================CONTACT DIV WINDOW===============================>>> -->

                <div class="mainWindows" nrw="link4">
                    <!-- <h1 class="op-1 text-center">Window Contacts</h1> -->

                    <section class="content bgcolor-10">
                        <h2 class="text-center h2-color">Contact Me</h2>

                        <form class="form-formation" action="#" method="post">
                            <div class="text-center">
                                    <span class="input input--shoko">
                                        <input class="input__field input__field--shoko" id="nameField" type="text" placeholder="Your Name"/>
                                        <svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                            <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                                            <path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
                                        </svg>
                                    </span>
                                    <span class="input input--shoko">
                                        <input class="input__field input__field--shoko" id="emailField" type="email" placeholder="Email"/>
                                        <svg class="graphic graphic--shoko" width="300%" height="50%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                            <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                                            <path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
                                        </svg>
                                    </span>
                                    <br>
                            </div>
                                    <span class="text-span">
                                        <textarea class="text-textarea"  name="name" id="textAreaField" rows="5" placeholder="Your Message Here!"></textarea>
                                    </span>

                                        <input class="submit-text" id="buttonToSend" type="button" name="" value="Send!">

                                        <!-- <div class="submit-text" id="buttonToSend">Send!</div> -->
                            </form>
                    </section>
                </div>
            </main>
    <!-- <<<==========================END OF WINDOWS===================================>>> -->


            <!-- ======= start of NAV ======= -->
            <!-- NENAUDOJAMAS NAV -->
            <nav class="mdl-cell mdl-cell--3-col mdl-cell--8-col-tablet mdl-cell--4-col-phone nm np" id="allNavigation">
                <svg class="path au-70" id="svg-line-first" height="100%" width="1">
                    <line x1="0" y1="100%" x2="0" y2="0" style="stroke:#FE01E7;stroke-width:5" />
                </svg>
                <div class="mdl-grid au-40 nm">
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone np" id="switchOff">

                    </div>
                </div>
                <!-- ANTRA NAV SEKCIJA -->
                <div class="content-grid mdl-grid nm">
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone np">
                        <div class="list-group ml-5 mr-5 text-center" id="font-edit">
                            <a href="#" class="sideLinks list-group-item list-group-item-action" nrl="link1">ABOUT</a>
                            <a href="#" class="sideLinks list-group-item list-group-item-action mt-3" nrl="link2">MUSIC</a>
                            <a href="#" class="sideLinks list-group-item list-group-item-action mt-3" nrl="link3">GALLERY</a>
                            <a href="#" class="sideLinks list-group-item list-group-item-action mt-3" nrl="link4">CONTACTS</a>
                        </div>
                    </div>
                </div>
            </nav>

                <!-- ======= NENAUDOJAMAS DIV ======= -->
            <div class="mdl-cell mdl-cell--1-col">

            </div>


        </div>
        <!--sitas div uzdaro konteieneri -->
    <!-- </div> -->


    <!-- ========end of wrapper and NAV======== -->

    <!-- ========start of FOOTER======== -->
    <!-- <div class="container"> -->
        <footer class="mdl-grid au-5 mb-2">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">

            </div>


        </footer>
    </div>
    <div class="" id="fullSizeWrapper"></div>
    <!-- </div> -->

</div>
</body>

</html>
