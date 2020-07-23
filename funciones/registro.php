<?php
include 'cn.php';
$nombre=$_POST["nombre"];
$email=$_POST["email"];
$password=$_POST["password"];

$insertar ="INSERT INTO Covid(Nombre,Correo,Clave)VALUES('$nombre','$email','$password')";
$resultado =mysqli_query($conexion,$insertar);

if(!$resultado){
echo 'Error al registrarse';
}else{

    echo 'Usuario registrado exitosamente';
}

mysqli_close($conexion);
