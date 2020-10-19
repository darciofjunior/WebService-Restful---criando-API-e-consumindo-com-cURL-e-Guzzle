<?php

include_once '../bootstrap/start.php';

function login()
{
    $email      = 'darciofjunior81@gmail.com';
    $password   = 'dr178264';

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_CUSTOMREQUEST   => 'POST',
        CURLOPT_POSTFIELDS      => [
            'email'     => $email, 
            'password'  => $password,
        ],
        CURLOPT_URL             => 'localhost:8000/api/v1/auth'
    ]);

    $response = json_decode(curl_exec($curl));

    curl_close($curl);

    return $response->token;
}

function products($token)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_URL             => 'localhost:8000/api/v1/products',
        CURLOPT_HTTPHEADER      => [
            "Authorization: Bearer {$token}"
        ],
    ]);

    $response = json_decode(curl_exec($curl));

    curl_close($curl);

    return $response;
}

$login      = login();
$products   = products($login);

echo '<pre>';
var_dump($products);

//if(isset($products->data) && count($products->data) > 0) {

if(isset($products->data)) {
    $products = $products->data;

    foreach($products->data as $product)
    {
        echo "<p>Nome: {$product->name}</p>";
        echo "<p>Descrição: {$product->description}</p>";
        echo "<hr/>";
    }
}else {
    echo "Nenhum Produto cadastrado";
}
