<?php
require_once ('mercadopago.php');

// Sandbox
//$mp = new MP('TEST-5595184022048439-102214-1cfc3b276b896ba45756121ca2644cf1-363292093');

// Produção
$mp = new MP('APP_USR-5595184022048439-102214-ae8266d7c6a6309dd752271cb74247d3-363292093');

print_r($_POST);

echo 'passou aqui 0<hr/>';

$payment_data = array(
        "transaction_amount" => 0.10,
        "token" => $_POST['token'],
        "description" => "Title of what you are paying for",
        "installments" => 1,
        "payment_method_id" => "master",
        "payer" => array (
                "email" => $_POST['email']
        )
);

echo 'passou aqui 1<hr/>';

try {
    
    $payment = $mp->post("/v1/payments", $payment_data);
    
} catch (MercadoPagoException $e) {
    
    echo 'Message: ', $e->getMessage(), '<br/>Error: ', $e->getCode(), '<br/>Trace: ', $e->getTraceAsString(), '<br/>';
    
    var_dump($e);
    
} finally {
    
    echo 'passou aqui no finally<br/>';
}

echo 'passou aqui 2<hr/>';

var_dump($payment);

echo 'passou aqui 3<hr/>';
?>