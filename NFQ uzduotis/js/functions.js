function orderNumber(length) {
  var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  var uniqueNum = "";
  for (var i = 0; i < length; i++) {
    var x = Math.floor(Math.random() * chars.length);
    uniqueNum += chars.charAt(x);
  }
  return uniqueNum;
}

function addToDb(buyer) {
  $.ajax({
    url: './php/add_to_db.php',
    data: {
      name: buyer.name,
      lastName: buyer.lastName,
      email: buyer.email,
      shippingAdr: buyer.shippingAdr,
      qty: buyer.qty,
      orderPrice: buyer.orderPrice,
      orderNumber: buyer.orderNumber
    },
  });
}

function insertGuitarPrice() {
  $.ajax({
      url: './php/get_guitar_price.php',
      type: 'GET'
    })
    .done(function(data) {
      $('#guitarPrice').html(data);
    });

}

function hideShippingInfo() {
  $('.shipping_info_div').css({
    'transition': 'all ease 1s',
    'left': '0%',
    'opacity': '0'
  });
  setTimeout(function() {
    $('.shipping_info_div').hide();
    $('.buyer_information_p').remove(); //removes buyer information from DOM
  }, 1000);
}

function guitarSound (){
    var guitarHover = $('.test_sound');
    var guitarAudio = $('.guitar').find('audio')[0];
    guitarHover.hover(function(){
       guitarAudio.play();
    }, function(){
       guitarAudio.stop();
    });
});
