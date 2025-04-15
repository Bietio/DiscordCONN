<?php

include 'css.php';

echo "<h1>DiscordCONN_v1.0</h1>";

$config = json_decode(file_get_contents('config.json'));

//Iniciar
$ch = curl_init('https://discord.com/api/v9/channels/' . $config->channelID . '/messages');


//Configução;
curl_setopt_array($ch,[
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => str_replace('{TOKEN}', $config->token, $config->headers),
    CURLOPT_POSTFIELDS     => json_encode($config->data)
]);

//Executar
$response = curl_exec($ch);

//Erros, Output
if (curl_errno($ch)) 
{
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

//Encerrar
curl_close($ch);
?>