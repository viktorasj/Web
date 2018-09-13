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

  if(returnedJson === ""){
    $('#error_report').html('');
    $('form').slideUp();
  }
  else{
    $('#error_report').html(returnedJson).slideDown();
  }
}

$('#buy_button').click(function(){
    var order_info = {
      name: $('#name').val(),
      email: $('#email').val(),
      sh_addr: $('#sh_addr').val(),
      qty: $('#qty').val()
    };
    make_order (order_info);
});
