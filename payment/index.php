<?php
require_once ('mercadopago.php');

$mp = new MP('TEST-5595184022048439-102214-1cfc3b276b896ba45756121ca2644cf1-363292093');

print_r($_POST);

$payment_data = array(
        "transaction_amount" => 100,
        "token" => "ff8080814c11e237014c1ff593b57b4d",
        "description" => "Title of what you are paying for",
        "installments" => 1,
        "payment_method_id" => "visa",
        "payer" => array (
                "email" => "tiago.ferreira@roihero.com.br"
        )
);

$payment = $mp->post("/v1/payments", $payment_data);

var_dump($payment);
?>