<?php
require_once ('mercadopago.php');

$mp = new MP('TEST-5595184022048439-102214-1cfc3b276b896ba45756121ca2644cf1-363292093');

print_r($_POST);

echo 'passou aqui 0<hr/>';

$payment_data = array(
        "transaction_amount" => 100,
        "token" => $_POST['token'],
        "description" => "Title of what you are paying for",
        "installments" => 1,
        "payment_method_id" => "visa",
        "payer" => array (
                "email" => $_POST['email']
        )
);

echo 'passou aqui 1<hr/>';

try {
    
    $payment = $mp->post("/v1/payments", $payment_data);
    
} catch (MercadoPagoException $e) {
    
    echo 'Message: ', $e->getMessage(), ' Error: ', $e->getCode(), ' Trace: ', $e->getTraceAsString();
    
    var_dump($e);
    
} finally {
    
    echo 'passou aqui no finally<br/>';
    
}

echo 'passou aqui 2<hr/>';

var_dump($payment);

echo 'passou aqui 3<hr/>';
?>