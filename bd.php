<?php
    function make_connection(){
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registro";
        $con = new mysqli($host, $username, $password, $dbname);

        if($con->connect_error)
        {
            echo "Hay un error en la conexión de la base de datos" . $con->connect_error;
        }
        else
        {
            //echo "Conectado exitosamente";
        }
        return $con;
    }
?>