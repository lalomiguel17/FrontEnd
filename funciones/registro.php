<?php
include("conexionbd.php");

if(isset($_POST['registro'])){


if(strlen($_POST['email'])>=1 && strlen($_POST['id'])>=1){

$id=trim($_POST['id']);
$nombre=trim($_POST['nombre']);
$email=trim($_POST['email']);
$password=trim($_POST['password']);
$consulta = "INSERT INTO Registros(idUsuario, Nombre, Correo, Clave)VALUES('$id','$nombre','$email','$password')";
$resultado=mysqli_query($conex,$consulta);

if($resultado){
    ?>
    <h3 class="ok">Te has inscrito </h3>
<?php
}else{
?>

<h3 class="bad">ha ocurrido un error </h3>
<?php

}
}  else{

?>

<h3 class="bad">Porfavor completa los campos</h3>
<?php
}
}
?>




