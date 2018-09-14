function make_order (order_info){
  var returnedJson = $.ajax({
    url: "./php/controller.php",
    type: 'post',
    data: order_info,
    async: false,
    success: function(data) {
      return data;
    }
  }).responseText;
  var order_details = JSON.parse(returnedJson);
  if(!order_details.message){
    $('#error_report').html('');
    animate_form1 ();
    $('#confirmation_window').css({'display':'block'});
    
  }
  else{
    $('#error_report').html(order_details.message).slideDown();
  }
}

function animate_form1 (){
  setTimeout(function(){
    $('.form_style').css({'display':'none'});
  }, 1000);
    $('.form_style').css({
    'transition': 'all ease 1s',
    'left': '100%',
    'opacity': '0'
  });
}


function create_order_id(length) {
  var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  var uniqueNum = "";
  for (var i = 0; i < length; i++) {
    var x = Math.floor(Math.random() * chars.length);
    uniqueNum += chars.charAt(x);
  }
  return uniqueNum;
}

$('#buy_button').click(function(){
    var order_info = {
      name: $('#name').val(),
      email: $('#email').val(),
      sh_addr: $('#sh_addr').val(),
      qty: $('#qty').val(),
      order_id: create_order_id(8)
    };
    make_order (order_info);
});
