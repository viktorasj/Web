window.onload = function () {
function doStuff() {
document.getElementById('musicWindow').style.visibility = "visible"; //reikalingas ijungti music div'a;
document.getElementById("svg-line-first").style.filter = "grayscale(0%)";
$("main.col-md-7").css("border-left","#FE01E7 1px solid");
$("main.col-md-7").css("border-right","#FE01E7 1px solid");
for (var i = 0; i < mainWArray.length; i++) {
    console.log(mainWArray);
    if (mainWArray[i] == event.target.getAttribute('nrl')) {
        console.log("atidaro ", i, "langa");
        $('.mainWindows').eq(i).animate({opacity: 1}, 500).show();
        mainW[i].style.backgroundColor = "rgba(0, 0, 0, 1)";
        document.getElementById("svg-line-first").style.opacity = "0";
    }
    else if(mainWArray[i] != event.target.getAttribute('nrl')) {
        mainW[i].style.backgroundColor = "rgba(0, 0, 0, 0)";
        $('.mainWindows').eq(i).animate({opacity: 0}, 800).hide();
    }
  }
}

function refresh(){
    for (var i = 0; i < mainWArray.length; i++){
        mainW[i].style.display = "none";
    }
}



    var sideLinks = document.getElementsByClassName('sideLinks');
    var mainW = document.getElementsByClassName('mainWindows');
    var swNav = document.getElementById("switchOff");
    var lietus = document.getElementById('lie');
    var debesis = document.getElementById('deb');
    var clickable = document.getElementById('clickable');
    var expGallery = document.getElementById('exp-gallery');
    console.log(sideLinks);
    console.log(mainW);
    var mainWArray = [];



    for (i = 0; i < sideLinks.length; i++) {
        sideLinks[i].addEventListener('click', doStuff);
    }

    for (i = 0; i < mainW.length; i++) {
        mainWArray.push(mainW[i].getAttribute("nrw"));
    }
    console.log(mainWArray);

    swNav.addEventListener('click', refresh);

    debesis.onmouseup = function (){
        lietus.style.opacity = 0;
};

debesis.onmousedown = function (){
    lietus.style.opacity = 0.5;
};

debesis.ondblclick = function (){
    lietus.style.opacity = 0.5;
};


$(".sideLinks").click(function(){
  $(".sideLinks").removeClass("active");
  $(this).addClass("active");
});



$( "#draggable" ).draggable();

$( "#rain" ).draggable();
};



$(document).ready(function(){
    $(window).scroll(function(){
       $( "list-group-item").next().addClass( "active" );
       $( "list-group-item").removeClass("active");
   });
});

// slider for

$(document).ready(function(){
   $('.slider').bxSlider({
       responsive: true,
       pager: false,
       randomStart: true,
       keyboardEnabled: true
   });
 });
