<?php require_once('./config.php'); 


if($_GET){
  $amount  = $_GET['amount'];
}else{
  $amount = 1000;
}

?>

<!DOCTYPE html>
<html>
<head>
<style>

body {
  background-color: linen;
  height: 100vh;
  align-items: center;
  justify-content: center;
}

.center {
  margin: auto;
  width: 50%;
  padding: 100px 0;
}

.button-class {
  margin: auto;
  height: 100px;
  width: 300px;
  background-color: purple;
  color: white;
  font-size: 25px;
}

.about {
  background-color: white;
  margin: 10px;
  padding: 5px;
  border: 3px solid purple;
}

</style>
</head>
<body>

<div class='center'>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Street Tithers Donation"
          data-amount=<?php echo $amount; ?>
          data-locale="auto">  
  </script>
  <script>
        // Hide default stripe button, be careful there if you
        // have more than 1 button of that class
        document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
  </script>
  <button type="submit" class="button-class">Donate with Card</button>
  <input type="hidden" value=<?php echo $amount; ?> id="amount" name="amount">
</form>
<p><a href="support.php">Support</p>
</div>

</body>
</html>