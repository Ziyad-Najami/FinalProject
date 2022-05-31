<!DOCTYPE html>
<html lang="en">

<head>
  <link href="design.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/all.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <div class="row">
    <div class="col-75">
      <div class="payment-container ">

        <form action="#">
          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname">
              <label for="adr"><i class="fa-solid fa-address-card"></i> Address</label>
              <input type="text" id="adr" name="address">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city">
            </div>

            <div class="col-50">
              <h3>Payment</h3>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth">
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv">
                </div>
              </div>
            </div>

          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" value="Continue to checkout" class="btn">
        </form>

      </div>
    </div>
  </div>

</body>

</html>