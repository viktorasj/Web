window.onload = function () {
function doStuff() {
document.getElementById("svg-line-first").style.filter = "grayscale(0%)";
for (var i = 0; i < mainWArray.length; i++) {
    if (mainWArray[i] == event.target.getAttribute('nrl')) {
        console.log("atidaro ", i, "langa");
        mainW[i].style.backgroundColor = "rgba(0, 0, 0, 0.8)";
        mainW[i].style.opacity = "1";
        mainW[i].style.zIndex = "3";
        document.getElementById("svg-line").style.opacity = "1";
        document.getElementById("svg-line-first").style.opacity = "0";
    }
    else if(mainWArray[i] != event.target.getAttribute('nrl')) {
        mainW[i].style.backgroundColor = "rgba(0, 0, 0, 0)";
        mainW[i].style.opacity = "0";
        mainW[i].style.zIndex = "0";
    }
  }
}

function refresh(){
    for (var i = 0; i < mainWArray.length; i++){
        mainW[i].style.backgroundColor = "rgba(255, 255, 255, 0)";
        mainW[i].style.opacity = "0";
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







$( function() {
  $( "#draggable" ).draggable();
} );

$( function() {
  $( "#rain" ).draggable();
} );
};
