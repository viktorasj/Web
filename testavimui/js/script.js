function doStuff() {



    for (var i = 0; i < mainWArray.length; i++) {
        if (mainWArray[i] == event.target.getAttribute('nrl')) {
            console.log("atidaro ", i, "langa");
            mainW[i].style.display = "block";
            mainW[i].style.opacity = "1";
        }
        else if(mainWArray[i] != event.target.getAttribute('nrl')) {
            mainW[i].style.display = "none";
            mainW[i].style.opacity = "0";
        }
    }
}


var linkai = document.getElementsByTagName('a');
var mainW = document.getElementsByClassName('mainW');
var mainWArray = [];


for (var i = 0; i < linkai.length; i++) {
    linkai[i].addEventListener('click', doStuff);
}
for (i = 0; i < mainW.length; i++) {
    mainWArray.push(mainW[i].getAttribute("nrw"));
}
console.log(mainWArray);
