window.onload = function() {


    $('.submit-text').click(function(){
        var name = $('#nameField').val();
        var email = $('#emailField').val();
        var textToSend = $('#textAreaField').val();

        if(name == "" || email == "" || textToSend == ""){
            $('#buttonToSend').attr('value','Blank fields');
            $('#buttonToSend').css({
                                        color: '#fec90e',
                                        }, 200);
            setTimeout(function() {
                $('#buttonToSend').attr('value','Send!');
                $('#buttonToSend').css({
                                            color: '#A09C9C',
                                            }, 200);
            }, 4000);

            return;
        }

        if(!validateEmail(email)) {
            $('#buttonToSend').attr('value','Check email address');
            $('#buttonToSend').css({
                                        color: '#e71f1f',
                                        }, 200);
            setTimeout(function() {
                $('#buttonToSend').attr('value','Send!');
                $('#buttonToSend').css({
                                            color: '#A09C9C',
                                            }, 200);
            }, 4000);

            return;
        }


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
                                            width: '53vw'
                                        }, 200);
                $('#buttonToSend').clearQueue();
                $('#buttonToSend').stop();
            }
        });
        $('.submit-text').unbind('click');
    });

    $.ajax({
            url: './php/iframe_sources.php',
            type: 'GET'
        })
        .done(function(data) {
            document.getElementById('divForIframe').innerHTML += data;

        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {

        });

    function validateEmail(tester) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(tester);
        }

    function doStuff() {


        document.getElementById("svg-line-first").style.filter = "grayscale(0%)";
        $("main.mdl-cell--7-col").css("border-left", mainSiteColor + " 1px solid");
        $("main.mdl-cell--7-col").css("border-right", mainSiteColor + " 1px solid");
        for (var i = 0; i < mainWArray.length; i++) {
            if (mainWArray[i] == event.target.getAttribute('nrl')) {
                // console.log("atidaro ", i, "langa");
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


    function showPlayer(e) {

        for (var i = 0; i < playerDivs.length; i++) {


            if (e.target.attributes.linkid.value === playerDivs[i].attributes[2].value) {
                $("#divForIframe").slideDown("slow");
                $(".visIframes").eq(i).fadeIn(3000);
                var currentSrc = playerDivs[i].getAttribute('data-src');
                playerDivs[i].setAttribute('src', '');
                playerDivs[i].setAttribute('src', currentSrc);
                console.log(playerDivs[i]);

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
    var rain = document.getElementById('rn');
    var cloud = document.getElementById('cld');
    var clickable = document.getElementById('clickable');
    var expGallery = document.getElementById('exp-gallery');
    var mainWArray = [];
    var albumLinks = document.getElementsByClassName('art');
    var playerDivs = document.getElementsByClassName('visIframes');
    var photoLinks = document.getElementsByClassName('photo-links');


$('.menu-gallery').on('click', function () {
    for (i = 0; i < photoLinks.length; i++) {
        var currentSrc = photoLinks[i].firstChild.getAttribute('data-src');
        console.log(currentSrc);
        photoLinks[i].firstChild.setAttribute('src', '');
        photoLinks[i].firstChild.setAttribute('src', currentSrc);
    }
});

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


    cloud.onmouseup = function() {
        rain.style.visibility = "hidden";
    };

    cloud.onmousedown = function() {
        rain.style.visibility = "visible";
    };

    cloud.ondblclick = function() {
        rain.style.visibility = "visible";
    };


    $(".sideLinks").click(function() {
        $(".sideLinks").css({
                        'font-weight': '100',
                        'background-color' : 'transparent',
                        'box-shadow' : 'none',
                        'color' : 'white'
                    }).mouseout(function(){
                        $(this).css("color","white");
                    }).mouseover(function(){
                        $(this).css({
                            'color' : mainSiteColor,
                            'font-weight' : '100',
                            'background-color' : 'transparent',
                            'border' : 'none'
                        });
                    });
        $(this).css({
                'font-weight': '100',
                'background-color' : 'transparent',
                'box-shadow' : 'inset 0px 0px 0px 1px ' + mainSiteColor,
                'color' : mainSiteColor
            }).off('mouseout').off('mouseover');
    });

    $(".sideLinks").mouseover(function(){
        $(this).css({
            'color' : mainSiteColor,
            'font-weight' : '100',
            'background-color' : 'transparent',
            'border' : 'none'
        });
    });

    $(".sideLinks").mouseout(function(){
        $(this).css("color","white");
    });


    $('#LogIn-click').click(function(){
        $('#LogInWindow').slideToggle(2000);
    });

    $('#newTracks').click(function(){
        $('#movingNewTracks').slideToggle(1000);
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

    $("div.newsfeed-parent:nth-child(2n+1)").addClass("fdrr");


};
