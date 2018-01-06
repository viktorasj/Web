<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sraunus</title>
    <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "./css/material.grey-purple.min.css">
    <link rel = "stylesheet" href = "./css/set2.css">
    <link rel = "stylesheet" href = "./libs/font-awesome-4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="./css/style.css?v=1.0.4">



</head>

<body>

<?php
include_once ('./php/database_functions.php');
include_once ('./php/main-login.php');
include_once ('./php/color_get.php');

?>
    <div class="container-fluid np">
        <div id="divForIframe">
            <svg id="music-cross-button" height="2em" width="2em"><line x1="0" y1="0" x2="100%" y2="100%" style="stroke:<?php echo $color['color_code'] ?>;stroke-width:6"></line><line x1="0" y1="100%" x2="100%" y2="0" style="stroke:<?php echo $color['color_code'] ?> ;stroke-width:6"></line></svg>
            <div id="divForIframeInv">

            </div>
        </div>
        <div id="LogIn-click"></div>
        <div id="LogInWindow">
            <form class="login-form" action="index.php" method="post">
                    <input class="login-inputs" type="text" name="username" value="" placeholder="Username" pattern="[a-zA-Z0-9]+" required title="Numbers and letters only" autofocus>
                    <input class="login-inputs" type="password" name="password" value="" placeholder="Password" pattern="[a-zA-Z0-9]+" required title="Numbers and letters only">
                    <button type="submit" class="button-LogIn" name="login" value="Login">LogIn</button>

            </form>
        </div>






        <header class="mdl-grid au-10">

    <!-- ==================HEADER============= -->
            <div class="mdl-cell mdl-cell--12-col nm">
                <div id="draggable" class="draggable">
                    <img class="cloud" id="cld" src="./images/cloud.png" alt="">
                    <img class="rain" id="rn" src="./images/rain-cropped-sm.gif" alt="">
                </div>

    <!-- ==================HEADERIO LINKAI==================-->
                    <div class="logo-links">
                        <a href="https://www.discogs.com/artist/1032357-Sraunus" target="_blank"><img class="header-logo ml-1" src="./images/discogs-logo.png" alt="sraunus-soundcloud-logo"></a>
                        <a href="https://soundcloud.com/sraunus" target="_blank"><img class="header-logo ml-1" src="./images/soundcloud-logo.png" alt="sraunus-soundcloud-logo"></a>
                        <a href="https://www.facebook.com/sraunus/" target="_blank"><img class="header-logo ml-1" src="./images/facebook-logo.png" alt="sraunus-soundcloud-logo"></a>
                    </div>
                    <div class="list-group mr-5 text-center tablet-menu" id="font-edit">
                        <a href="#" class="sideLinks " nrl="link1">ABOUT</a>
                        <a href="#" class="sideLinks " nrl="link2">NEWS</a>
                        <a href="#" class="sideLinks " nrl="link3">MUSIC</a>
                        <a href="#" class="sideLinks menu-gallery" nrl="link4">GALLERY</a>
                        <a href="#" class="sideLinks " nrl="link5">CONTACTS</a>
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
    <!-- <<<==========================NEWS DIV WINDOW===============================>>> -->
            <div class="mainWindows about-formation" nrw="link2">
                <h2 class="text-center h2-color">Newsfeed</h2>
              <?php
              $result = getNews ($connection);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="newsfeed-parent m-4">

                    <div class="news-date-title text-center">
                     <div class=""><?php echo $row['date'] ?></div>
                     <hr>
                     <div class="mt-3"><?php echo $row['title'] ?></div>

                    </div>
                    <div class="news-content">
                        <?php echo $row['content'] ?>
                    </div>
                </div>
              <?php }?>


            </div>

    <!-- <<<==========================MUSIC DIV WINDOW===============================>>> -->

                <div class="mainWindows pad-music music-formating text-center music-padding" nrw="link3" id="musicWindow">
                    <div class="mb-2 p-2" style="height: 170; background-color: rgba(84, 72, 99, 0.65)" id="newTracks">
                        <span class="newTracksSpan">Click for my newest tracks</span>
                        <!-- <img class="soundcloud-logo" src="./images/soundcloud-color.png" alt="logo" style="width: 4vw"> -->
                    </div>
                    <div class="" style="background-color: rgba(84, 72, 99, 0.65)" id="movingNewTracks">
                        <iframe width="100%" height="400" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/282664734&amp;color=%23bcbcbc&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true"></iframe>
                    </div>

                    <?php $result = getAlbumLinks ($connection);
                    foreach ($result as $value) {?>
                        <img class="art alb-img-format" linkid="" src="<?php echo $value['artLinks'] ?>" alt="">
                    <?php } ?>
                </div>

    <!-- <<<==========================GALLERY DIV WINDOW===============================>>> -->
    <div class="mainWindows gallery-formating" nrw="link4" id="photoGallery">
        <?php
        $result = getImagePaths ($connection);
        $photoPaths = [];
        foreach ($result as $path) {
        $photoPaths[]= "./".ltrim($path['thumb_path'], "/.");
        }
        foreach ($photoPaths as $i => $path) {?>
            <a href="#?photoID=<?php echo $i ?>" class="photo-links"><img class="thumb" src="about:blank" data-src="<?php echo $path ?>" alt=""></a>
        <?php }; ?>

    </div>


    <!-- <<<==========================CONTACT DIV WINDOW===============================>>> -->

                <div class="mainWindows" nrw="link5">
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
                    <line x1="0" y1="100%" x2="0" y2="0" style="stroke:<?php echo $color['color_code'] ?>;stroke-width:5" />
                </svg>
                <div class="mdl-grid au-35 nm">
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone np">

                    </div>
                </div>
                <!-- ANTRA NAV SEKCIJA -->
                <div class="content-grid mdl-grid nm">
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone np">
                        <div class="list-group ml-5 mr-5 text-center" id="font-edit">
                            <a href="#" class="sideLinks" nrl="link1">ABOUT</a>
                            <a href="#" class="sideLinks mt-4" nrl="link2">NEWS</a>
                            <a href="#" class="sideLinks mt-4" nrl="link3">MUSIC</a>
                            <a href="#" class="sideLinks mt-4 menu-gallery" nrl="link4">GALLERY</a>
                            <a href="#" class="sideLinks mt-4" nrl="link5">CONTACT</a>
                        </div>
                    </div>
                </div>
            </nav>

                <!-- ======= NENAUDOJAMAS DIV ======= -->
            <div class="mdl-cell mdl-cell--1-col">

            </div>


        </div>
        <!--sitas div uzdaro konteieneri -->



    <!-- ========end of wrapper and NAV======== -->

    <!-- ========start of FOOTER======== -->

        <footer class="mdl-grid au-5 mb-2">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">

                </div>
            </div>


        </footer>


</div>
<div class="" id="fullSizeWrapper"></div>


</div>
        <script src="./libs/Popper/Popper.js" defer></script>
        <script src="./libs/jQuery/jquery-3.2.1.min.js" defer></script>
        <script src="./libs/bootstrap/js/bootstrap.min.js" defer></script>
        <script src="./js/script-carousel.js?v=1.0.1" defer></script>
        <script src="./libs/jQuery/jquery-ui v1.12.1.js"defer ></script>
        <script src="./js/script.js?v=1.0.4" defer></script>
    </body>

</html>
