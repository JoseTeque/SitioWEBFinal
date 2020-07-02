<?php
    require 'paypal/autoload.php';

    define('URL_SITIO', 'http://localhost:81/proyectofinal/');

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'ASXJ82xkUM6fBkoDJhhSyqbbpwSobvlUVDnA1XBVeBrFBqNpCz3Fu-VVOG63A241IJQlonnRTAzs6wfb', //CLIENTID
            'ENS35hCp5vYfl-Qi9vPmD46LX8AgBVadQBh2F-Ph7LuS40hIKBlNhDWKuEDnQht0MrV9kpgGh3y0lGJ5' //SECRECT
        )
        );

?>
