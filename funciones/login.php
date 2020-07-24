<?php
//include 'cn.php';
$json=new stdClass();
$json->Correo=$_POST["email"];
$json->Clave=$_POST["password"];
//var_dump($json);

$json1=new stdClass();
$json1->URL="http://192.168.99.100/proyectofinal/public/api/login";
$json1->VERBO="POST";
$json1->JSON=json_encode($json);

apicall($json1);

header('Location:../vista/index.html');

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
