window.onload = function() {

    $('.submit-text').click(function(){
        var name = $('#nameField').val();
        var email = $('#emailField').val();
        var textToSend = $('#textAreaField').val();

        document.getElementById("nameField").value = "";
        document.getElementById("emailField").value = "";
        document.getElementById("textAreaField").value = "";
        $.ajax({
            url:'./php/mailData.php',
            data: {name: name,
                   email: email,
                   message: textToSend},
            // data: 'name='+name,
            success: function(){
                $('#buttonToSend').attr('value','Message Sent!');
                $('#buttonToSend').css({
                                            border: '2px solid #33e71f',
                                            color: '#33e71f',
                                            width: '51vw'
                                        }, 200);
                $('#buttonToSend').clearQueue();
                $('#buttonToSend').stop();
            }
        });
        $('.submit-text').unbind('click');
    });

    $.ajax({
            url: './php/iframe_sources.php',
            type: 'GET',
        })
        .done(function(data) {
            document.getElementById('divForIframe').innerHTML += data;

        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete loading all Iframes to 'Music'");
        });



    function doStuff() {


        $('#musicWindow').css("visibility", "visible"); //reikalingas ijungti music div'a;
        document.getElementById("svg-line-first").style.filter = "grayscale(0%)";
        $("main.mdl-cell--7-col").css("border-left", "#FE01F5 1px solid");
        $("main.mdl-cell--7-col").css("border-right", "#FE01F5 1px solid");
        for (var i = 0; i < mainWArray.length; i++) {
            if (mainWArray[i] == event.target.getAttribute('nrl')) {
                console.log("atidaro ", i, "langa");
                $('.mainWindows').eq(i).animate({
                    opacity: 1
                }, 500).show();
                mainW[i].style.backgroundColor = "rgba(0, 0, 0, 0.6)";
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

    function showPlayer(e) {

        for (var i = 0; i < playerDivs.length; i++) {


            if (e.target.attributes.linkid.value === playerDivs[i].attributes[2].value) {
                $("#divForIframe").slideDown("slow");
                $(".visIframes").eq(i).fadeIn(3000);
                var currentSrc = playerDivs[i].getAttribute('data-src');
                playerDivs[i].setAttribute('src', '');
                playerDivs[i].setAttribute('src', currentSrc);
            }
        }
        $('#music-cross-button').click(function() {

            $(".visIframes").fadeOut(1000, function() {
                $('#divForIframe').slideUp("slow");
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


    for (i = 0; i < albumLinks.length; i++) {
        albumLinks[i].setAttribute("linkid", "music" + [i]);
        albumLinks[i].addEventListener('click', showPlayer);
    }

    swNav.addEventListener('click', refresh);

    debesis.onmouseup = function() {
        lietus.style.visibility = "hidden";
    };

    debesis.onmousedown = function() {
        lietus.style.visibility = "visible";
    };

    debesis.ondblclick = function() {
        lietus.style.visibility = "visible";
    };


    $(".sideLinks").click(function() {
        $(".sideLinks").removeClass("active");
        $(this).addClass("active");
    });



    $("#draggable").draggable();


    $("#rain").draggable();

    $(".text-textarea").focusin(function() {
        $('.text-span').css({
            'border-top': 'solid 2px #e71f1f',
            'border-bottom': 'solid 2px #e71f1f'
        });
    });
    $(".text-textarea").focusout(function() {
        $('.text-span').css({
            'border-top': 'solid 2px #A09C9C',
            'border-bottom': 'solid 2px #A09C9C'
        });
    });




};
