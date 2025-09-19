<?php
require_once 'vendor/autoload.php';

// PayMongo Secret Key
$secretKey = "sk_test_MP5zYLuGbzjwLNg5S2FgTf93";
$authHeader = "Basic " . base64_encode($secretKey . ":");

// Get form input
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$amount = intval($_POST['amount']) * 100; // centavos

// -------------------
// CREATE CHECKOUT SESSION
// -------------------
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paymongo.com/v1/checkout_sessions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Authorization: $authHeader",
  "Content-Type: application/json"
]);

echo $payload = [
  "data" => [
    "attributes" => [
      "line_items" => [[
        "currency" => "PHP",
        "amount" => $amount,
        "name" => "Test Payment",
        "quantity" => 1
      ]],
      "payment_method_types" => [ "card","gcash","paymaya"], // all available methods. The type of payment method. The possible values are qrph, brankas, card, dob, gcash, grab_pay, billease and paymaya.

      "customer" => [
        "name" => $name,
        "email" => $email,
        "phone" => $phone
      ],
      "success_url" => "http://localhost/PaymentMethods/index.php",
      "cancel_url" => "http://localhost/PaymentMethods/index.php"
    ]
  ]
];

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
$response = curl_exec($ch);
curl_close($ch);

$checkout = json_decode($response, true);

// -------------------
// REDIRECT USER TO CHECKOUT PAGE
// -------------------
if (isset($checkout['data']['attributes']['checkout_url'])) {
  $checkoutUrl = $checkout['data']['attributes']['checkout_url'];
  header("Location: " . $checkoutUrl);
  exit;
} else {
  echo "Error creating checkout session: " . $response;
}
