<?php require_once('./config.php'); 


if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $amount  = $_POST['amount'];
}else{
  $amount = 1000;
}

?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Street Tithers Donation"
          data-amount=<?php echo $amount; ?>
          data-locale="auto"></script>
  <input type="hidden" value=<?php echo $amount; ?> id="amount" name="amount">
</form>