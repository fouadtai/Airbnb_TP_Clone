<?php

require 'vendor/autoload.php';

use Stripe\Stripe;
use Stripe\PaymentIntent;

// Set your Stripe API secret key
$stripeSecretKey = 'your_stripe_secret_key_here';

Stripe::setApiKey($stripeSecretKey);

// Create a PaymentIntent with the order amount and currency
function createPaymentIntent($amount, $currency = 'usd')
{
    return PaymentIntent::create([
        'amount' => $amount, // Amount in cents
        'currency' => $currency,
        'payment_method_types' => ['card'],
    ]);
}
