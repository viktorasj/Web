window.onload = function() {


    function doStuff() {


        $('#musicWindow').css("visibility", "visible"); //reikalingas ijungti music div'a;
        document.getElementById("svg-line-first").style.filter = "grayscale(0%)";
        $("main.mdl-cell--7-col").css("border-left", "#FE01E7 1px solid");
        $("main.mdl-cell--7-col").css("border-right", "#FE01E7 1px solid");
        for (var i = 0; i < mainWArray.length; i++) {
            if (mainWArray[i] == event.target.getAttribute('nrl')) {
                console.log("atidaro ", i, "langa");
                $('.mainWindows').eq(i).animate({
                    opacity: 1
                }, 500).show();
                mainW[i].style.backgroundColor = "rgba(0, 0, 0, 1)";
                document.getElementById("svg-line-first").style.opacity = "0";
            } else if (mainWArray[i] != event.target.getAttribute('nrl')) {
                mainW[i].style.backgroundColor = "rgba(0, 0, 0, 0)";
                $('.mainWindows').eq(i).animate({
                    opacity: 0
                }, 800).hide();
            }
        }
    }

    function refresh() {
        for (var i = 0; i < mainWArray.length; i++) {
            mainW[i].style.display = "none";
        }
    }

    function showPlayer (e) {
        console.log(playerDivs);
        for (var i = 0; i < playerDivs.length; i++) {

        if (e.target.attributes.linkid.value === playerDivs[i].attributes[2].value){
                $("#divForIframe").slideDown("slow");
                $(".visIframes").eq(i).fadeIn(3000);
                var currentSrc = playerDivs[i].getAttribute('data-src');
                playerDivs[i].setAttribute('src', '');
                playerDivs[i].setAttribute('src', currentSrc);
                }
        }
        $('#music-cross-button').click(function(){

            $(".visIframes").fadeOut(3000, function (){
                $('#divForIframe').slideUp("slow");
                console.log(playerDivs);
                console.log(document.getElementById('#divForIframe'));
        });
    });

    }




    var sideLinks = document.getElementsByClassName('sideLinks');
    var mainW = document.getElementsByClassName('mainWindows');
    var swNav = document.getElementById("switchOff");
    var lietus = document.getElementById('lie');
    var debesis = document.getElementById('deb');
    var clickable = document.getElementById('clickable');
    var expGallery = document.getElementById('exp-gallery');
    var mainWArray = [];
    var albumLinks = document.getElementsByClassName('art');
    var playerDivs = document.getElementsByClassName('visIframes');





    for (i = 0; i < sideLinks.length; i++) {
        sideLinks[i].addEventListener('click', doStuff);
    }

    for (i = 0; i < mainW.length; i++) {
        mainWArray.push(mainW[i].getAttribute("nrw"));
    }


    for (i = 0; i < playerDivs.length; i++) {
        playerDivs[i].setAttribute("playerid", "music"+[i]);
    }

    for (i = 0; i < albumLinks.length; i++) {
        albumLinks[i].setAttribute("linkid", "music"+[i]);
        albumLinks[i].addEventListener('click', showPlayer);
    }

    swNav.addEventListener('click', refresh);

    debesis.onmouseup = function() {
        lietus.style.display = "none";
    };

    debesis.onmousedown = function() {
        lietus.style.display = "block";
    };

    debesis.ondblclick = function() {
        lietus.style.display = "block";
    };


    $(".sideLinks").click(function() {
        $(".sideLinks").removeClass("active");
        $(this).addClass("active");
    });



    $("#draggable").draggable();


    $("#rain").draggable();


};
