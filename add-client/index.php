<?php
require_once ('../payment/mercadopago.php');

// Sandbox
$mp = new MP('TEST-5595184022048439-102214-1cfc3b276b896ba45756121ca2644cf1-363292093');

// Produção
//$mp = new MP('APP_USR-5595184022048439-102214-ae8266d7c6a6309dd752271cb74247d3-363292093');


try {
    
    $customer = $mp->post ("/v1/customers", array("email" => "test1@test.com"));
    
} catch (MercadoPagoException $e) {
    
    echo 'Message: ', $e->getMessage(), '<br/>Error: ', $e->getCode(), '<br/>Trace: ', $e->getTraceAsString(), '<br/>';
    
    var_dump($e);
    
} finally {
    
    echo 'passou aqui no finally<br/>';
}



// echo 'Status: ', $customer['status'], '<hr/>';
//echo 'Id: ', $customer['response']['id'], '<hr/>';

print_r ($customer);

//echo '<hr/>Json: ', json_encode($customer), '<hr/>';
?>