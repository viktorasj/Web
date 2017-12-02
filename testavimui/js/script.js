var albumLinks = document.getElementsByClassName('art');
var playerDivs = document.getElementsByClassName('visIframes');
var divForIframe = document.getElementById('divForIframe');
console.log(albumLinks);

for (var i = 0; i < playerDivs.length; i++) {
    playerDivs[i].setAttribute("playerid", "music"+[i]);
}
for (var i = 0; i < albumLinks.length; i++) {
    albumLinks[i].setAttribute("linkid", "music"+[i]);
    albumLinks[i].addEventListener('click', showPlayer);
}

function showPlayer (e) {
    console.log(playerDivs);
    for (var i = 0; i < playerDivs.length; i++) {

    if (e.target.attributes.linkid.value === playerDivs[i].attributes[2].value){
            divForIframe.style.display = "block";
            playerDivs[i].style.display = "block";

            var currentSrc = playerDivs[i].getAttribute('data-src');
            playerDivs[i].setAttribute('src', '');
            playerDivs[i].setAttribute('src', currentSrc);
            }
    }

}
