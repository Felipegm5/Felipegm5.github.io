<?php
include("database.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["add"]))
    {
        if($_POST["inputBox"]!=NULL && $_POST["inputBox2"]!=NULL && $_POST["inputBox3"]!=NULL)
        {
            $tarea = $_POST["inputBox"] . " <br> " . $_POST["inputBox2"] . " <br> " . $_POST["inputBox3"];
            add_items($tarea);
        }
    }
    else if(isset($_POST["checked"]))
    {
        update_items($_POST["checked"]);
    }
    else if(isset($_POST["deleted"]))
    {
        delete_items($_POST["deleted"]);
    }
    header("Location:http://localhost/Rubrica/codigo.php");
}

?>