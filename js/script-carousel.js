var photoLinks = document.getElementsByClassName('photo-links');


for (var i = 0; i < photoLinks.length; i++) {
    photoLinks[i].firstChild.id = "photo"+[i];
    photoLinks[i].addEventListener('click', showGallery);
}
console.log(photoLinks);


function showGallery() {
    console.log(event.target.id);
    for (var u = 0; u < photoLinks.length; u++) {
        photoLinks[u].firstChild.className = 'd-block img-fluid mx-auto photo-formating';
    }
    console.log(photoLinks);

    var parentDiv = document.createElement('div');
    parentDiv.className = 'popup-formating';
    parentDiv.id = 'parentDiv';
    document.body.insertBefore(parentDiv, document.body.firstChild);

    var text = '<svg id="cross-button" height="2em" width="2em"><line x1="0" y1="0" x2="100%" y2="100%" style="stroke:#FE01E7;stroke-width:6"></line><line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#FE01E7;stroke-width:6"></line></svg>';
    document.getElementById('parentDiv').innerHTML = text;


    var containerDiv = document.createElement('div');
    containerDiv.className = 'container';
    containerDiv.id = 'id1';
    document.getElementById('parentDiv').appendChild(containerDiv);

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
    }
        else /*if (event.target.id != photoLinks[i].firstChild.id)*/ {
            var carouselItem = document.createElement('div');
            carouselItem.className = 'carousel-item';
            carouselItem.id = ('id' + [i+100]);
            document.getElementById('id2').appendChild(carouselItem);
            document.getElementById('id' + [i+100]).innerHTML = photoLinks[i].innerHTML;

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
        photoLinks[j].firstChild.className = 'thumb';
        // photoLinks[j].firstChild.className = ("thumb");
    }
    console.log(document.getElementsByTagName('body'));

    var exit = document.getElementById('cross-button');
    console.log(exit);

    exit.onclick = function() {
        // console.log(remGalFromBody);
        document.getElementById("parentDiv").remove();
        for (var i = 0; i < photoLinks.length; i++) {
            photoLinks[i].addEventListener('click', showGallery);
        }
    };








}




//=========================================================================




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
