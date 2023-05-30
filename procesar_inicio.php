<?php
session_start();
include ("usuario.php");
$con = make_connection();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $usuario = new Usuario("reg");
    $usuario->setEmail($email);
    $usuario->setPassword($password);

    $usuario->inicio();
}
?>
