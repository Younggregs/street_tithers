<?php
  require_once('./config.php');

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
  $amount = $_POST['amount'];

  $real_amount = $amount / 100;


  $customer = \Stripe\Customer::create([
      'email' => $email,
      'source'  => $token,
  ]);

  $charge = \Stripe\Charge::create([
      'customer' => $customer->id,
      'amount'   => $amount,
      'currency' => 'usd',
  ]);

  echo '<h1>Successfully charged $'. $real_amount .'!</h1>';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style/style.css">
   
  </head>
  <body>
    
  </body>
</html>