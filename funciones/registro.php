<?php
//include 'cn.php';
$json=new stdClass();
$json->id=$_POST["id"];
$json->nombre=$_POST["nombre"];
$json->email=$_POST["email"];
$json->passwod=$_POST["password"];
var_dump($json);
