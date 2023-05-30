<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo '<script> alert("Debes iniciar sesion para continuar");window.location.href ="http://localhost/Rubrica/inicio.php";</script>';;
    session_destroy();
    die();
}
include("database.php");
//include("POO_registro.php");
?>
<?php
setlocale(LC_TIME, 'es_CO.utf8');
date_default_timezone_set('America/Bogota');

$fecha_actual = date("l, d \d\\e F");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANIFICADOR</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style2.css">

</head>
 <nav id="navegacion">
        <div class="botones">
                <a href="http://localhost/Rubrica/cerrar.php" class="boton">Cerrar Sesion</a>
        </div>
    </nav>
<body>
    <div class="formulario">
        <h2 class="top-heading"><?php echo $fecha_actual;?></h2>
        <h1 class="top-heading">BUEN DIA</h1>
        <div class="container">
            <form action="manejoAcciones.php" method="post">
                <div class="input-container">
                    <input type="text" name="inputBox" id="inputBox"  placeholder="Ingrese una tarea">
                    <input type="date" name="inputBox2" id="inputBox2"  placeholder="Fecha">
                    <input type="text" name="inputBox3" id="inputBox3"  placeholder="Descripcion">
                    <button type="submit" name="add" id="add">AGREGAR</button>
                </div>
                <h2 class="top-heading">Tus tareas de hoy</h2>
                <ul class="list">
                    <?php
                        $itemList = get_items();
                        while($row=$itemList->fetch_assoc())
                        {
                    ?>
                </ul>
                    <li class="item">
                        <p><?php echo $row["item"];?></p>
                        <div class="icon-container">
                            <button type="submit" name="checked" id="check" value="<?php echo $row["id"];?>"><i class="fas fa-check-circle"></i></button><!--<i class="fa-sharp fa-regular fa-circle-check">-->
                            <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"];?>"><i class="fas fa-thin fa-trash"></i></button>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <hr>
                <ul class="list">
                <?php
                        $itemList = get_items_checked();
                        while($row=$itemList->fetch_assoc())
                        {
                    ?>
                    <li class="item fade">
                        <p class="deleted-text"><span><?php echo $row["item"];?></span>
                        <div class="icon-container">
                            <button type="submit" name="" id="check"><i class="fas fa-check-circle hidden"></i></button><!--<i class="fa-sharp fa-regular fa-circle-check">-->
                            <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"];?>"> <i class="fas fa-thin fa-trash"></i></button>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </form>
        </div>
        <script src="https://kit.fontawesome.com/4e07701ab0.js" crossorigin="anonymous"></script>
    </div>
</body>
</html>