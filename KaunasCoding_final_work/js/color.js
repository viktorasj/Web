$.ajax({
    url: './php/color_get.php',
    type: 'GET',
})
.done(function(data) {
    var mainColor = data;
    console.log(mainColor);
});
