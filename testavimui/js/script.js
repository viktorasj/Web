var photoLinks = document.getElementsByClassName('photo-links');
var exit = document.getElementById('exit');
console.log(exit);

for (var i = 0; i < photoLinks.length; i++) {
    photoLinks[i].firstChild.id = "photo"+[i];
    photoLinks[i].addEventListener('click', showGallery);
}
console.log(photoLinks);


function showGallery() {
    console.log(event.target.id);
    for (var i = 0; i < photoLinks.length; i++) {
        photoLinks[i].firstChild.id = "photo"+[i];
        photoLinks[i].firstChild.className = "d-block img-fluid mx-auto";
        photoLinks[i].addEventListener('click', showGallery);
    }
    console.log(photoLinks);

    var containerDiv = document.createElement('div');
    containerDiv.className = 'container';
    containerDiv.id = 'id1';
    document.getElementsByTagName('body')[0].appendChild(containerDiv);

    var carouselControlsDiv = document.createElement('div');
    carouselControlsDiv.id = 'carouselExampleControls';
    carouselControlsDiv.className = 'carousel slide';
    document.getElementById('id1').appendChild(carouselControlsDiv);
    document.getElementById('carouselExampleControls').setAttribute("data-ride", "carousel");

    var carouselInner = document.createElement('div');
    carouselInner.className = 'carousel-inner';
    carouselInner.id = "id2";
    document.getElementById('carouselExampleControls').appendChild(carouselInner);
    document.getElementById('id2').setAttribute("role", "listbox");


    for (var i = 0; i < photoLinks.length; i++) {
        if (event.target.id == photoLinks[i].firstChild.id) {
            var carouselItemActive = document.createElement('div');
            carouselItemActive.className = 'carousel-item active';
            carouselItemActive.id = 'id' + [i+10];
            document.getElementById('id2').appendChild(carouselItemActive);
            document.getElementById('id' +[i+10]).innerHTML = photoLinks[i].innerHTML;
            console.log(document.getElementById('id' +[i+10]).innerHTML);
    }
        else /*if (event.target.id != photoLinks[i].firstChild.id)*/ {
            var carouselItem = document.createElement('div');
            carouselItem.className = 'carousel-item';
            carouselItem.id = ('id' + [i+100]);
            document.getElementById('id2').appendChild(carouselItem);
            document.getElementById('id' + [i+100]).innerHTML = photoLinks[i].innerHTML;
            console.log(photoLinks[i].innerHTML);

        }

}

    var a1 = document.createElement('a');
    a1.className = 'carousel-control-prev';
    a1.id = 'id5';
    a1.href = '#carouselExampleControls';
    a1.setAttribute("role", "button");
    a1.setAttribute("data-slide", "prev");
    document.getElementById('id2').appendChild(a1);

    var span1 = document.createElement('span');
    span1.className = "carousel-control-prev-icon";
    span1.setAttribute("aria-hidden", "true");
    document.getElementById('id5').appendChild(span1);

    var span2 = document.createElement('span');
    span2.className = "sr-only";
    document.getElementById('id5').appendChild(span2);

    var a2 = document.createElement('a');
    a2.className = 'carousel-control-next';
    a2.id = 'id6';
    a2.href = '#carouselExampleControls';
    a2.setAttribute("role", "button");
    a2.setAttribute("data-slide", "next");
    document.getElementById('id2').appendChild(a2);

    var span3 = document.createElement('span');
    span3.className = "carousel-control-next-icon";
    span3.setAttribute("aria-hidden", "true");
    document.getElementById('id6').appendChild(span3);

    var span4 = document.createElement('span');
    span4.className = "sr-only";
    document.getElementById('id6').appendChild(span4);

    for (var j = 0; j < photoLinks.length; j++) {
        photoLinks[j].removeEventListener('click', showGallery);
        console.log(photoLinks);
        photoLinks[j].firstChild.className -= ("d-block img-fluid mx-auto");
    }
    console.log(document.getElementsByTagName('body'));

}


exit.onclick = function() {
    // console.log(remGalFromBody);
    document.getElementById("id1").remove();
    for (var i = 0; i < photoLinks.length; i++) {
        photoLinks[i].addEventListener('click', showGallery);
    }


};









// function doStuff() {
//
//
//
//     for (var i = 0; i < mainWArray.length; i++) {
//         if (mainWArray[i] == event.target.getAttribute('nrl')) {
//             console.log("atidaro ", i, "langa");
//             mainW[i].style.display = "block";
//             mainW[i].style.opacity = "1";
//         }
//         else if(mainWArray[i] != event.target.getAttribute('nrl')) {
//             mainW[i].style.display = "none";
//             mainW[i].style.opacity = "0";
//         }
//     }
// }
//
//
// var linkai = document.getElementsByTagName('a');
// var mainW = document.getElementsByClassName('mainW');
// var mainWArray = [];
//
//
// for (var i = 0; i < linkai.length; i++) {
//     linkai[i].addEventListener('click', doStuff);
// }
// for (i = 0; i < mainW.length; i++) {
//     mainWArray.push(mainW[i].getAttribute("nrw"));
// }
// console.log(mainWArray);

// var element = "div,p,google";
// var j = element.split(',');
// var crt;
//
// for(var i = 0; i < j.length; i++) {
//     crt = document.createElement(j[i]);
//     document.body.appendChild(crt);
// }
