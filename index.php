<?php
 
    
    $amount = isset($_GET['amount']) ? $_GET['amount'] : 100;
    

?>

<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
</head>

<body>
  <script
  src="https://www.paypal.com/sdk/js?client-id=AWZpDQR41Gd0P1EBFO0og79w9TobooSxCjwBzV6bpPX6EQSmCDE1LglFqpSdk2TlJ4J7J-U710JAaYUK">
  </script>

    <div id="paypal-button-container"></div>
    



<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // Set up the transaction
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: <?php echo '\''.$amount.'\''; ?>
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        alert('Transaction completed by ' + details.payer.name.given_name);
        // Call your server to save the transaction
        return fetch('/paypal-transaction-complete', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            orderID: data.orderID
          })
        });
      });
    }
  }).render('#paypal-button-container');
</script>


</body>
</html>