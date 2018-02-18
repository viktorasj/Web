<?php
include_once ('./php/header.php');
include_once ('./php/footer.php');

$input_fields = array('buyer_name' => 'Name', //an array for input field names
                      'buyer_lastName' => 'Last name',
                      'buyer_email' => 'Email',
                      'buyer_shippingAdr' => 'Shipping address',
                      'buyer_qty' => 'Qty of Guitars');

?>

    <div class="guitar">
      <audio src="./sound/guitar.mp3" preload="auto"></audio>
    </div>
    <div class="container">
        <div class="order_div">
          <p class="h4 text-center mb-3 fill_up_headline">Please fill-up buyer's form</p>

            <?php foreach ($input_fields as $id => $input_field_name): ?>
              <div class="group">
                <input type="text" id="<?php echo ($id)?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><?php echo ($input_field_name) ?></label>
              </div>
            <?php endforeach; ?>

          <div class="buy_button">
            <p id="buy_button" class="text-center">Buy me!</p>
          </div>

        </div>

        <div class="shipping_info_div">
            <p class="h4 text-center mb-3 shipping_info_headline">Check shipping information</p>
            <div class="buyer_information">
            </div>
            <div class="incorrect confirm_button">
              <p>Refill</p>
            </div>
            <div class="correct confirm_button">
              <p>It's correct</p>
            </div>
        </div>

        <div class="confirmation_div">
            <p class="h4 text-center mb-3 shipping_info_headline">Billing information</p>
            <p class="h5 billing_information">Congratulations <span id="buyer-name"></span>! Thank you for your purchace. We're waiting for your payment to us. Your order number is <span id="order-number"></span>. Don't forget to fill it in "Details" input field while doing a bank transfer. We'll ship your <b>unique</b> guitar in 1-2 working days after the payment is received. We'll email everything soon.</p>
        </div>


      <div class="row">
        <div class="col-md-12 mt-10">
          <div class="">
            <p class="homemade_text">Homemade Acoustic Guitar</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="buy_me_button">
            <p>Buy me for <span id="guitarPrice"></span>&euro;</p>
          </div>
        </div>

      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="guitar_div">
              <div class="test_sound"></div>
              <img src="./img/guitar.png" alt="">
            </div>
          </div>
        </div>
    </div>
<?php  ?>
