<?php
//include ("bd.php");
include ("buscar_editar.php");
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['edad']) && isset($_POST['genero']))
{
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];

    actualizarDatos($nombre, $apellido, $email, $edad, $genero, $id);

}
else
{
    echo '<script> alert("Error al procesar el formulario.");window.location.href ="http://localhost/Rubrica/buscar_editar.html";</script>';
}
?>