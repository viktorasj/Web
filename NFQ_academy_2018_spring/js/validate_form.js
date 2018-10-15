var buy_button_text = document.getElementById('buy_button'); // select button to change text and color if not valid

function validateEmail(tester) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(tester);
}

function changeButtonOnFail (failText) {
  $(buy_button_text).html(failText);
  $(buy_button_text).css({'color': '#e71f1f'}, 200);
  setTimeout(function() {
      $(buy_button_text).html('Buy Me!');
      $(buy_button_text).css({'color': '#000000'}, 200);
  }, 4000);
  return false;
}

function validate (buyer) {
  if (buyer.name === "" ||
      buyer.lastName === "" ||
      buyer.email === "" ||
      buyer.shippingAdr === "" ||
      buyer.qty === "") {
      changeButtonOnFail ('You left blank fields');
    }
  else if (buyer.qty <= 0 || buyer.qty >5) {
      changeButtonOnFail ('Check quantity field (max qty is 5)');
    }
  else if (!validateEmail(buyer.email)) {
      changeButtonOnFail ('Check email');
    }
  else if (isNaN(buyer.qty)) {
      changeButtonOnFail ('Qty must be number');
    }
  else {
      return true;
    }
}
