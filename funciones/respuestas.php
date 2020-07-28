<?php
//include 'cn.php';
$json=new stdClass();

$json->descripcion_Respuesta=$_POST["n"];
$json->descripcion_Respuesta=$_POST["w"];
$json->descripcion_Respuesta=$_POST["p"];
$json->descripcion_Respuesta=$_POST["0"];
$json->descripcion_Respuesta=$_POST["1"];
$json->descripcion_Respuesta=$_POST["2"];
$json->descripcion_Respuesta=$_POST["3"];
$json->descripcion_Respuesta=$_POST["4"];
$json->descripcion_Respuesta=$_POST["5"];
$json->descripcion_Respuesta=$_POST["6"];
$json->descripcion_Respuesta=$_POST["7"];
$json->descripcion_Respuesta=$_POST["8"];
$json->descripcion_Respuesta=$_POST["9"];
$json->descripcion_Respuesta=$_POST["10"];
$json->descripcion_Respuesta=$_POST["l"];
$json->descripcion_Respuesta=$_POST["11"];
$json->descripcion_Respuesta=$_POST["12"];
$json->descripcion_Respuesta=$_POST["13"];





//var_dump($json);

$json1=new stdClass();
$json1->URL="http://192.168.99.100/proyectofinal/public/api/respuestas";
$json1->VERBO="POST";
$json1->JSON=json_encode($json);

apicall($json1);

header('Location:../vista/sintomas.html');

//header('Location:../vista/sintomas.html');
var_dump(apicall($json1));

function apicall($query){
    $ch = curl_init();        
    
    $optArray = array(
        CURLOPT_URL =>$query->URL,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST=>$query->VERBO,
        CURLOPT_POSTFIELDS=>$query->JSON,
        CURLOPT_HTTPHEADER=>array('Content-type: application/json'),
    );        
    curl_setopt_array($ch, $optArray);    
    $response=new stdClass();
    $response->body = curl_exec($ch);        
    $response->responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);  
    return $response;  //
}