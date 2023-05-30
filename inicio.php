<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("location:http://localhost/Rubrica/codigo.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="http://localhost/Rubrica/style.css">
    <link rel="stylesheet" href="http://localhost/Rubrica/style2.css">
    <link rel="schprtcut icon" href="http://localhost/Rubrica/logo.png" />
    
</head>
<body>


    <nav id="navegacion">
        <a class="opciones" href="http://localhost/Rubrica/index.html">Volver al Inicio</a>

    </nav>
    <br><br>
    <div class="formulario">
        <h1>Inicio de Sesion</h1>
        <form  action="http://localhost/Rubrica/procesar_inicio.php" method="POST" >
            <div class="username">
                <label for="nombre"></label>
                <input type="email" id="nombre" name="email" placeholder="correo electrónico" required/>
                <br>
            </div>
            <div class="contraseña">
                <label for="contraseña"></label>
                <input type="password" id="contraseña" name="password" placeholder="contraseña" required/>
                <input type="text" id="mostrar-contraseña" style="display: none;">
                <input type="button" value="Mostrar"  onclick="mostrarOcultarContraseña();">
                <br>
            </div>
            <input type="submit" value="Iniciar"><a href="http://localhost/Rubrica/codigo.php"></a>
            <br> 
            <!--<br><div class="recordar"><center>¿Olvido su contraseña?</center></div>-->
            <div class="registrarse">
            <hr><br>
                ¿No tienes cuenta? <a href="http://localhost/Rubrica/registro.php">Registrate</a>
            </div>
        </form>

    </div>
</body>
<script>
function mostrarOcultarContraseña() {
    var contraseña = document.getElementById("contraseña");
    var botónMostrar = document.getElementById("botón-mostrar");

    if (contraseña.type === "password") {
        var valorContraseña = contraseña.value;
        contraseña.type = "text";
        contraseña.value = valorContraseña;
        botónMostrar.textContent = "Ocultar Contraseña";
    } else {
        var valorContraseña = contraseña.value;
        contraseña.type = "password";
        contraseña.value = valorContraseña;
        botónMostrar.textContent = "Mostrar Contraseña";
    }
}
</script>
</html>

