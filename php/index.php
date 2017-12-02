<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project1</title>
    <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./libs/bxslider/jquery.bxslider.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
    <!-- !!! mano CSS visada zemiau -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/script.js" defer></script>
    <script src="./js/script-carousel.js" defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./libs/bxslider/jquery.bxslider.min.js"></script>
    <link rel = "stylesheet" href = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
    <script src = "https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>

<body>

    <!-- <svg id="cross-button" height="5em" width="5em">
        <line x1="0" y1="0" x2="100%" y2="100%" style="stroke:#FE01E7;stroke-width:6" />
        <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#FE01E7;stroke-width:6" />
    </svg> -->




    <div class="container-fluid">


        <div id="divForIframe">
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=255314140/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/ambient">Ambient by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=1601112954/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/atmospheric-insomnia">Atmospheric Insomnia by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=4103229316/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/asperatus-clouds">Asperatus Clouds by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=74384327/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/vibrant-dead-rock">VIBRANT DEAD ROCK by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=3142394891/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/season-1">Season 1 by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=1290605309/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/novellas">Novellas by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=24979014/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/apie-pauli-epet">Apie Paulių Šepetį by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=936072141/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/humanistinis-ep">Humanistinis ep by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=3145400858/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/zukunft-afrika">Zukunft Afrika by Sraunus</a></iframe>
                <iframe class="visIframes" style="border: 0; width: 30vw; height: 79vh;" playerid="" src="about:blank" data-src="https://bandcamp.com/EmbeddedPlayer/album=1270721151/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/" seamless><a href="http://sraunus.bandcamp.com/album/out-of-the-city">Out Of The City by Sraunus</a></iframe>
                <svg id="music-cross-button" height="2em" width="2em"><line x1="0" y1="0" x2="100%" y2="100%" style="stroke:#FE01E7;stroke-width:6"></line><line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#FE01E7;stroke-width:6"></line></svg>
        </div>






        <header class="mdl-grid au-10">
            <div id="draggable" class="draggable">
                <img class="debesis" id="deb" src="./images/cloud.png" alt="">
                <img class="lietus" id="lie" src="./images/rain-cropped-sm.gif" alt="">
            </div>
    <!-- ==================HEADER============= -->
            <div class="mdl-cell mdl-cell--12-col">

    <!-- ==================HEADERIO LINKAI==================-->
                    <div class="logo-links">
                        <a href="https://www.discogs.com/artist/1032357-Sraunus" target="_blank"><img class="header-logo ml-1" src="./images/discogs-logo.png" alt="sraunus-soundcloud-logo"></a>
                        <a href="https://soundcloud.com/sraunus" target="_blank"><img class="header-logo ml-1" src="./images/soundcloud-logo.png" alt="sraunus-soundcloud-logo"></a>
                        <a href="https://www.facebook.com/sraunus/" target="_blank"><img class="header-logo ml-1" src="./images/facebook-logo.png" alt="sraunus-soundcloud-logo"></a>
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

            <main  class="mdl-cell mdl-cell--7-col au-70 nm">

    <!-- <<<==========================ABOUT DIV WINDOW===============================>>> -->

                <div class="mainWindows about-formation" nrw="link1">
                    <!-- <h1 class="op-1 text-center">Window About</h1> -->
                    <p class="text-formation">In early childhood Sraunus (real name – Paulius Markutis) started to play with a comb and piece of paper to imitate the sound of the flanger effect. He was singing in front of a mirror in his fictional language. That was how it all started, Sraunus experiment began. “It was a shame, that i was so little taught about music” – ironically adds the singer.Paulius creativity roots are firmly seated and he still sings in his own music in unknown language, which is most accurately understood only by himself. The others may interpret it according to themselves. Sraunus creations can be described as complicated electronic dub variations, that are floating between minimal techno and experimental restraints diving into pure ambient. Paulius himself is inclined to be called “Progressive or Regressive Dub”. In Sraunus journey through music experiments you can clearly hear his influence of Vangelis, Biosphere, Basic Channel community, Deepchord, Pink Floyd, Mr. Cloudy, Angelo Badalamenti (David Lynch’s “Twin Peaks” soundtrack author). Music to enjoy the charm of long and dark nights.</p>
                </div>
    <!-- <<<==========================MUSIC DIV WINDOW===============================>>> -->

                <div class="mainWindows pad-music music-formating" nrw="link2" id="musicWindow">
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/1Ambient.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/2Atmospheric_Insomnia.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/3Asperatus_Clouds.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/4VIBRANT_DEAD_ROCK.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/5Season_1.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/6Novellas.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/7Apie_Pauliu_Sepeti.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/8Humanistinis_ep.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/9Zukunft_Afrika.jpg" alt=""> </a>
                    <a href="#"> <img class="art alb-img-format" linkid="" src="./images_art/10Out_Of_The_City.jpg" alt=""> </a>
                </div>

    <!-- <<<==========================GALLERY DIV WINDOW===============================>>> -->
    <div class="mainWindows gallery-formating" nrw="link3" id="photoGallery">
        <!-- <div class="image-wrapper" id="photoGallery"> -->
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/bobos-resized.jpg" alt="bobos"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/bzis-resized.jpg" alt="bzis"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/dangus-II-resized.jpg" alt="dangus-II"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/darzine-resized.jpg" alt="darzine"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/i-vilniu-resized.jpg" alt="i-vilniu"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/DSC_1831.jpg" alt="nera aprasymo"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/grindys-lubos-resized.jpg" alt="grindys-lubos"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/DSC_1925.jpg" alt="nera aprasymo"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/du-stulpai-resized.jpg" alt="du stulpai"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/duda-resized.jpg" alt="duda"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/eina-resized.jpg" alt="eina"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/fa-bai-resized.jpg" alt="fa-bai"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/fabu-panorama-resized.jpg" alt="fabu-panorama"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/gedas-eina-su-meskere-resized.jpg" alt="gedas-eina-su-meskere"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/gedas-piromanas2-resized.jpg" alt="gedas-piromanas2"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/geds-piromanas-resized.jpg" alt="geds-piromanas"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/golfs-resized.jpg" alt="golfs"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/griausmas-resized.jpg" alt="griausmas"></a>
            <a href="#" class="photo-links"><img class="thumb" src="./images/Reduced gallery/DSC_1864.jpg" alt="nera aprasymo"></a>
        <!-- </div> -->
    </div>


    <!-- <<<==========================CONTACT DIV WINDOW===============================>>> -->

                <div class="mainWindows" nrw="link4">
                    <h1 class="op-1 text-center">Window Contacts</h1>

                </div>
            </main>
    <!-- <<<==========================END OF WINDOWS===================================>>> -->


            <!-- ======= start of NAV ======= -->
            <!-- NENAUDOJAMAS NAV -->
            <nav class="mdl-cell mdl-cell--3-col nm np">
                <svg class="path au-70" id="svg-line-first" height="100%" width="1">
                    <line x1="0" y1="100%" x2="0" y2="0" style="stroke:#FE01E7;stroke-width:5" />
                </svg>
                <div class="mdl-grid au-40 nm">
                    <div class="mdl-cell mdl-cell--12-col np" id="switchOff">

                    </div>
                </div>
                <!-- ANTRA NAV SEKCIJA -->
                <div class="mdl-grid nm">
                    <div class="mdl-cell mdl-cell--12-col np">
                        <div class="list-group ml-5 text-center">
                            <a href="#" class="sideLinks list-group-item list-group-item-action" nrl="link1">ABOUT</a>
                            <a href="#" class="sideLinks list-group-item list-group-item-action mt-2" nrl="link2">MUSIC</a>
                            <a href="#" class="sideLinks list-group-item list-group-item-action mt-2" nrl="link3">GALLERY</a>
                            <a href="#" class="sideLinks list-group-item list-group-item-action mt-2" nrl="link4">CONTACTS</a>
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
            <div class="mdl-cell mdl-cell--2-col">
<?php
echo "labas";
 ?>
            </div>


        </footer>
    <!-- </div> -->

</div>
    </body>

</html>
