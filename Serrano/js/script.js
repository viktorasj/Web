var navigation = document.getElementsByClassName('navi');


for (i = 0; i < navigation.length; i++) {
  navigation[i].addEventListener('click', addFood);
}

function addFood () {
  $('aside').empty(); //have to empty side menu because of previous food view
  var foodType = event.target.getAttribute('ba'); // what food is requested to getFoodByFoodType
  var receivedFood = JSON.parse(getFoodByFoodType (foodType)); // food object request
  console.log(receivedFood);
  $('<div/>',{ class : 'aside-list'}).appendTo('aside'); //sidemenu parent div is appended to aside
  for (i = 0; i < receivedFood.length; i++) { //food is appended to sidemenu
    var asideMenuItem = '<div class="card" food-name="' + receivedFood[i].food_name + '" food-type="'+ receivedFood[i].food_type + '">' +
                          '<div class="card-body">' +
                            '<img src="' + receivedFood[i].food_img_thumb +'" alt="'+ receivedFood[i].food_name +'">' +
                          '</div>' +
                          '<div class="card-footer text-center">' +
                              receivedFood[i].food_name +
                          '</div>' +
                        '</div>';
    $('div.aside-list').append(asideMenuItem);
  }

  $('.card').on('click', function (){
    for (i = 0; i < receivedFood.length; i++) {
      if (event.target.alt === receivedFood[i].food_name) {
        $('.food-pic, .ingridients_div').empty();
        $('<img/>', {class: 'img-wrap',
                     src: receivedFood[i].food_img_norm,
                     alt: receivedFood[i].food_name}).appendTo('.food-pic');
        $('.ingridients_div').append('<p class="ingridientsText">'+receivedFood[i].food_ingridients+'</p>');
        insertPriceStar (receivedFood[i].food_price_medium, receivedFood[i].food_price_big);
      }
    }
  });
}

function insertPriceStar (price1med, price2big){
    priceStar = ['<div class="price_parent_div">',
                  '<p class="price_parag_p1">Kaina</p>',
                  '<img class="price_star_img" src="./img/price_star.png">',
                  '</div>'];
  if (price1med < price2big ) {
    ins = '<p class="price_parag_p2">Vidutinė (32cm) - '+ price1med +'&euro;</p>' +
          '<p class="price_parag_p3">Didelė (42cm) - '+ price2big +'&euro;</p>';
  }
  else {
    ins = '<p class="price_parag_p5">'+ price1med +'&euro;</p>';
  }
    priceStar.splice(2, 0, ins);
    priceStar = priceStar.join("");
  $('.price_parent_div').remove();
  $('.price_div').append(priceStar);
}

function getFoodByFoodType (foodType) {
  return $.ajax({
      url:'./php/getFood.php',
      data: {foodType: foodType},
      async: false,
      success: function(data){
        return data;
      }
  }).responseText;
}
