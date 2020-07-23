<?php
public function conexion($query){

  $ch = curl_init();        
  $optArray = array(
      CURLOPT_URL =>$query->URL,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST=>$query->VERBO,
      CURLOPT_POSTFIELDS=>$query->DATA,
      CURLOPT_HTTPHEADER=>array('Content-type: text/plain'),
  );        
  curl_setopt_array($ch, $optArray);    


$response=new stdClass();
  $response->body = curl_exec($ch);        
  $response->responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);  
  return $response;     
}
?>