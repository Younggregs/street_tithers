<?php
 require_once('./Stripe/init.php');

$stripe = [
  "secret_key"      => "sk_live_qyPW7WGDgVHaY4EaGUn7fGok00CreExGaQ",
  "publishable_key" => "pk_live_GtTb3wkAnTUDN5XKoAfOOU1x00lINN35Id",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>