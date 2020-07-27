<?php
//include 'cn.php';
$json=new stdClass();

$json->descripcion_Respuesta=$_POST["i"];
$json->descripcion_Respuesta=$_POST["q"];
$json->descripcion_Respuesta=$_POST["j"];
$json->descripcion_Respuesta=$_POST["Medicamento"];
$json->descripcion_Respuesta=$_POST["dias"];
$json->descripcion_Respuesta=$_POST["Sintomas"];
$json->descripcion_Respuesta=$_POST["z"];
$json->descripcion_Respuesta=$_POST["Enfermedad"];




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