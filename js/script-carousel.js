var photoLinks = document.getElementsByClassName('photo-links');
console.log(photoLinks);

$.ajax({
        url: './php/photos.php',
        type: 'GET',
    })
    .done(function (data) {
        document.getElementById('fullSizeWrapper').innerHTML += data;

    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete loading all full size images");
    });

for (var i = 0; i < photoLinks.length; i++) {
    photoLinks[i].firstChild.id = "photo"+[i];
    photoLinks[i].addEventListener('click', showGallery);
}

function showGallery() {

    var fullSizeImg = $(".fullSizeImg").clone();
    console.log(fullSizeImg);

    var parentDiv = document.createElement('div');
    parentDiv.className = 'popup-formating';
    parentDiv.id = 'parentDiv';
    document.body.insertBefore(parentDiv, document.body.firstChild);
    $('.popup-formating').css('display','none');

    var text = '<svg id="cross-button" height="2em" width="2em"><line x1="0" y1="0" x2="100%" y2="100%" style="stroke:#FE01E7;stroke-width:6"></line><line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#FE01E7;stroke-width:6"></line></svg>';
    parentDiv.innerHTML = text;


    var containerDiv = document.createElement('div');
    containerDiv.className = 'container';
    containerDiv.id = 'id1';
    document.getElementById('parentDiv').appendChild(containerDiv);
    var carouselControlsDiv = document.createElement('div');
    carouselControlsDiv.id = 'carouselExampleControls';
    carouselControlsDiv.className = 'carousel slide';
    containerDiv.appendChild(carouselControlsDiv);
    containerDiv.setAttribute("data-ride", "carousel");

    var carouselInner = document.createElement('div');
    carouselInner.className = 'carousel-inner';
    carouselInner.id = "id2";
    document.getElementById('carouselExampleControls').appendChild(carouselInner);
    document.getElementById('id2').setAttribute("role", "listbox");


    for (var i = 0; i < photoLinks.length; i++) {
        if (event.target.id == fullSizeImg[i].id) {
            var carouselItemActive = document.createElement('div');
            carouselItemActive.className = 'carousel-item active';
            carouselItemActive.id = 'id' + [i+10];
            document.getElementById('id2').appendChild(carouselItemActive);
            fullSizeImg[i].style.display = "block";
            fullSizeImg[i].className = 'd-block img-fluid mx-auto photo-formating';
            var currentSrc = fullSizeImg[i].getAttribute('data-src');
            fullSizeImg[i].setAttribute('src', '');
            fullSizeImg[i].setAttribute('src', currentSrc);
            document.getElementById('id' +[i+10]).innerHTML = fullSizeImg[i].outerHTML;
    }
        else {
            var carouselItem = document.createElement('div');
            carouselItem.className = 'carousel-item';
            carouselItem.id = ('id' + [i+100]);
            document.getElementById('id2').appendChild(carouselItem);
            fullSizeImg[i].style.display = "block";
            fullSizeImg[i].className = 'd-block img-fluid mx-auto photo-formating';
            var currentSrc2 = fullSizeImg[i].getAttribute('data-src');
            fullSizeImg[i].setAttribute('src', '');
            fullSizeImg[i].setAttribute('src', currentSrc2);
            document.getElementById('id' + [i+100]).innerHTML = fullSizeImg[i].outerHTML;
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


    $('#parentDiv').show(500, "swing");

    $('#cross-button').click(function(){
        $('#parentDiv').hide(500, function(){
                $("#parentDiv").remove();
        });
    });
}
