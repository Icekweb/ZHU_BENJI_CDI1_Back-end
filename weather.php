<?php

//dire au explorer que c'est du json
header('Content-Type: application/json');

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

//Prendre le valeur city du front-end , si' iln'y a pas prend paris
$city = isset($_GET['city']) ? $_GET['city'] : 'Paris' ;

$client = new Client();

try {
    $response = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
        'query' => [
            'q' => $city,
            'appid' => 'aa08f06fab3f4c4ead05d17a4505a6db',
            'units' => 'metric',
            'lang' => 'fr'
        ]
     ]);

     //transforme le json en tableau associatif
     $data = json_decode($response->getbody(), true);

     //encoder le data en json et envoyer au fetch
     echo json_encode($data);
     


} catch(Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}


?>