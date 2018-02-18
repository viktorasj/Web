insertGuitarPrice(); // inserts price from database (functions.js)
//defining variables
var _buyerInfoList = document.getElementsByClassName('order_div')[0].querySelectorAll('label');
var buyerInfoList = [];
for (i = 0; i < _buyerInfoList.length; i++) {
  buyerInfoList.push(_buyerInfoList[i].innerHTML);
}
buyerInfoList.push('Total price', 'Order Number');
var uniqueNumber = orderNumber(8);

//buyer desides to buy and clicks the button

$('.buy_me_button').on('click', function() {
  $('.guitar_div').css({
    'transform': 'scale(0.7, 0.7) rotate(-90deg)', //animates guitar image
    'margin-right': '60%',
    'margin-top': '20%'
  });
  $('.homemade_text').css({
    'opacity': '0',
    'left': '30%'
  }, function() { //animates text from homepage
    $(this).hide();
  });
  $('.buy_me_button').css({
    'transform': 'scale(3, 3)',
    'opacity': '0'
  }, function() { //animates button from homepage
    $(this).hide();
  });
  $('.order_div').slideDown(1000, function() { //shows ordering form
    $(this).css({
      'z-index': '3'
    });
  });
  $('.test_sound').hide(); //hides guitar sound div
});

//buyer fills the form

$('.buy_button').on('click', function() {
  var buyer = constructBuyer(); //this function gets all information from input fields and returns buyer (construct_buyer.js)
  if (validate(buyer)) { // this expression validates if buyer filled-up everything correctly (validate_form.js)
    $('.order_div').css({
      'transition': 'all ease 1s',
      'left': '0',
      'opacity': '0'
    });
    setTimeout(function() {
      $('.order_div').hide();
    }, 1000);
    $('.shipping_info_div').show().css({
      'transition': 'all ease 1s',
      'z-index': '3',
      'left': '43%',
      'opacity': '1'
    }); //shows shipping information to check
    var i = 0;
    for (var key in buyer) { //this loop prints shipping information from the object;
      if (buyer.hasOwnProperty(key)) {
        var info = '<p class="buyer_information_p">' + buyerInfoList[i] + ': ' + buyer[key] + '</p>';
        $(info).appendTo($('.buyer_information'));
      }
      i++;
    }
  }
});

// buyer wants to refill the form
$('.incorrect').on('click', function() {
  hideShippingInfo(); //functions.js
  $('.order_div').show().css({
    'z-index': '3',
    'transition': 'all ease 1s',
    'left': '43%',
    'opacity': '1'
  });
});

// buyer confirms the informtion is correct
$('.correct').on('click', function() {
  hideShippingInfo(); //functions.js
  $('.confirmation_div').show().css({
    'z-index': '3',
    'transition': 'all ease 1s',
    'left': '43%',
    'opacity': '1'
  });
  var buyer = constructBuyer();
  $('#buyer-name').html(buyer.name);
  $('#order-number').html('<b>' + buyer.orderNumber + '</b>');
  addToDb(buyer);
});

// guitar sound
guitarSound(); //functions.js
