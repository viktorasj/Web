$('input[name=optradio_add]').click(function (){
  $('#add_form').show(250);
  $('.active').removeClass('active');
  switch (this.value) {
    case "pizza":
      $('[sub-id="food_name"], [sub-id="food_ingridients"], [sub-id="food_price_medium"], [sub-id="food_price_big"], [sub-id="food_img_norm"], [sub-id="food_cat"]').addClass('active');
      break;
    case "salad":
      $('[sub-id="food_name"], [sub-id="food_ingridients"], [sub-id="food_price"], [sub-id="food_img_norm"]').addClass('active');
      break;
    case "rolls":
      $('[sub-id="food_name"], [sub-id="food_ingridients"], [sub-id="food_price"], [sub-id="food_img_norm"]').addClass('active');
      break;
    case "other":
      $('[sub-id="food_name"], [sub-id="food_ingridients"], [sub-id="food_price"], [sub-id="food_img_norm"]').addClass('active');
      break;
    }
});

$('button[name=add_food]').click(function (){
  var collected_data = collect_data();
  for (var key in collected_data) {
    if (!collected_data[key])
        return;
      }
  send_data(collected_data);
});

function collect_data(){
    var food_to_add = {
    food_type: $('input[name=optradio_add]:checked').val(),
    food_name: $('input#food_name').val(),
    food_ingridients: $('input#food_ingridients').val(),
    food_price_medium: $('input#food_price_medium').val(),
    food_price_big: $('input#food_price_big').val(),
    food_price: $('input#food_price').val(),
    food_img_norm: $('input#food_img_norm').prop('files')[0].name,
    food_cat: $('option:selected').val(),
    image_file: $('input#food_img_norm').prop('files')[0]
  };
  if(!food_to_add.food_price) {
    food_to_add.food_price = food_to_add.food_price_big;
  }
  return food_to_add;
}


function send_data (product) {
  var request = new XMLHttpRequest ();
  var formData = new FormData();
  $.each(product, function(key, value) {
    formData.append(key, value);
  });
  formData.append('request_type', "add food");
  request.open('post', '../php/controller.php', true);
  request.send(formData);
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        clear_inputs (request.responseText);
      }
  };
}

function clear_inputs (message) {
  $('input[name=optradio_add]').prop('checked', false);
  $('#add_form').slideToggle();
  $('#food_name, #food_ingridients, #food_price_medium, #food_price_big, #food_img_norm, #food_cat').val("");
  $('label, input[name=optradio_add]').hide();
  if (message.includes("added")) {
    textColor = "rgb(27, 205, 2)";
    textToPrint = message.replace("added ", "");
  }
  else if (message.includes("err")) {
    textColor = "rgb(236, 2, 2)";
    textToPrint = message.replace("err ", "");
  }
  else {
    textColor = "rgb(236, 2, 2)";
    textToPrint = "Įvyko nenumatyta klaida, bandykite dar kartą";
  }
  $('div[sub-id=header_add]').append('<h3 style="color: '+textColor+'; transition: all ease 2s;">['+textToPrint+']</h3>');
  setTimeout(function(){
    $('div[sub-id=header_add] h3').css({
      'transform': 'scale(6, 6)',
      'opacity': '0'
    });
  }, 3000);
  setTimeout(function(){
    $('div[sub-id=header_add] h3').remove();
    $('label, input[name=optradio_add]').show();
  }, 4000);
}
