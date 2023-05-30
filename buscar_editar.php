<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="schprtcut icon" href="logo.png" />

</head>
<body>
<header id="titulo">
        <div class="contenedor">
            <div class="contenedor-imagen-titulo">
            <img src="logo.png" alt="Descripción de la imagen">
            <h1>ORGANIZER GUIDE</h1>
            </div>
    </header>
    </header>
    <nav id="navegacion">
        <a class="opciones" href="index.html">Volver al Inicio</a>

    </nav>
</body>
</html>   
<?php
include ("bd.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nombre = $_POST['nombre'];
    $con = make_connection();
    $query = "SELECT * FROM reg WHERE nombre = '$nombre'";
    $result = $con->query($query);

    function actualizarDatos($nombre, $apellido, $email, $edad, $genero, $id) {
        $con = make_connection();
        $query = "UPDATE reg SET nombre='$nombre', apellido='$apellido', email='$email', edad='$edad', genero='$genero' WHERE id='$id'";
        $result = $con->query($query);
    
        if($result) {
            echo '<script> alert("Los datos se actualizaron exitosamente.");window.location.href ="http://localhost/Rubrica/index.html";</script>';
        } else {
            echo "Error al actualizar los datos: " . $con->error;
        }
    }    

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            

            echo "<h2>Editar información:</h2>";
            echo "<form action='http://localhost/Rubrica/editar.php' method='POST'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<label for='nombre'>Nombre:</label>";
            echo "<input type='text' id='nombre' name='nombre' value='" . $row['nombre'] . "'><br><br>";
            echo "<label for='apellido'>Apellido:</label>";
            echo "<input type='text' id='apellido' name='apellido' value='" . $row['apellido'] . "'><br><br>";
            echo "<label for='email'>Email:</label>";
            echo "<input type='email' id='email' name='email' value='" . $row['email'] . "'><br><br>";
            echo "<label for='edad'>Edad:</label>";
            echo "<input type='number' id='edad' name='edad' value='" . $row['edad'] . "'><br><br>";
            echo "<label for='genero'>Género:</label>";
            echo "<select id='genero' name='genero'>";
            echo "<option value='masculino'" . ($row['genero'] == 'masculino' ? " selected" : "") . ">Masculino</option>";
            echo "<option value='femenino'" . ($row['genero'] == 'femenino' ? " selected" : "") . ">Femenino</option>";
            echo "<option value='otro'" . ($row['genero'] == 'otro' ? " selected" : "") . ">Otro</option>";
            echo "</select><br><br>";
            echo "<input type='submit' value='Editar'>";
            echo "</form>";
        }
    }
    else
    {

        echo '<script> alert("No se encontró ningún usuario con ese nombre.");window.location.href ="buscar_editar.html";</script>';
    }
}    
?>
