function constructBuyer(){
  function _buyer(name, lastName, email, shippingAdr, qty, orderPrice, orderNumber) {
      this.name = name;
      this.lastName = lastName;
      this.email = email;
      this.shippingAdr = shippingAdr;
      this.qty = qty;
      this.orderPrice = orderPrice;
      this.orderNumber = orderNumber;
  }
  var name = document.getElementById('buyer_name').value,
      lastName = document.getElementById('buyer_lastName').value,
      email = document.getElementById('buyer_email').value,
      shippingAdr = document.getElementById('buyer_shippingAdr').value,
      qty = document.getElementById('buyer_qty').value;
      guitarPrice = Number(document.getElementById('guitarPrice').innerHTML);
      orderPrice = guitarPrice*qty + "&euro;";
      orderNumber = uniqueNumber;

  var newBuyer = new _buyer(name, lastName, email, shippingAdr, qty, orderPrice, orderNumber);
  return newBuyer;
}
