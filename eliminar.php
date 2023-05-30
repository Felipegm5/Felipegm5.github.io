<?php
//include("bd.php");
include ("buscar_eliminar.php");

if(isset($_POST['id']))
{
    $id = $_POST['id'];
    eliminarDatos($id);
}
else
{
    echo '<script> alert("Error al procesar los datos.");window.location.href ="http://localhost/Rubrica/buscar_eliminar.html";</script>';
}
?>
