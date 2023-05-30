<?php
include("Usuario.php");
$con = make_connection();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$usuario = new Usuario('reg');
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmar_password = $_POST['confirmar_password'];
	$edad = $_POST['edad'];
	$genero = $_POST['genero'];
	
	$usuario->registro($usuario, $nombre, $apellido, $email, $password, $edad, $genero);
}
?>


