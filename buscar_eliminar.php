<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
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
    <nav id="navegacion">
        <a class="opciones" href="http://localhost/Rubrica/index.html">Volver al Inicio</a>
    </nav>
    <?php
    include ("bd.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $nombre = $_POST['nombre'];
        $con = make_connection();
        $query = "SELECT * FROM reg WHERE nombre = '$nombre'";
        $result = $con->query($query);

        function eliminarDatos($id) {
            $con = make_connection();
            $query = "DELETE FROM reg WHERE id='$id'";
            $result = $con->query($query);
        
            if ($result) {
                echo '<script> alert("Los datos se eliminaron exitosamente.");window.location.href ="http://localhost/Rubrica/index.html";</script>';
            } else {
                echo "Error al eliminar los datos: " . $con->error;
            }
        }
        

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "<h2>Información del usuario:</h2>";
                echo "<form id='eliminar-formulario' action='http://localhost/Rubrica/eliminar.php' method='POST'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<p>Nombre: " . $row['nombre'] . "</p>";
                echo "<p>Apellido: " . $row['apellido'] . "</p>";
                echo "<p>Email: " . $row['email'] . "</p>";
                echo "<p>Edad: " . $row['edad'] . "</p>";
                echo "<p>Género: " . $row['genero'] . "</p>";
                echo "<br>";
                echo "<input type='submit' name='eliminar' value='ELIMINAR'>";
                echo "</form>";
            }
        }
    }
    else
    {
        echo '<script> alert("Error al procesar los datos.");window.location.href ="buscar_eliminar.html";</script>';
    }
    ?>
</body>
</html>
