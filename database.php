<?php
function make_connection()
{
    $host="localhost";
    $username="root";
    $password="";
    $dbname="registro";
    $con=new mysqli($host,$username,$password,$dbname);

    if($con->connect_error)
    {
        echo "Hay un error en la conexión de la base de datos".$con->connect_error;
    }
    return $con;
    //echo "Conectado exitosamente";
}
function add_items($value)
{
    $con=make_connection();
    $query="INSERT INTO lista(id,item,fecha,status) VALUES(NULL,'$value',NOW(),'0')";
    $con->query($query);
}
function get_items()
{
    $con=make_connection();
    $query="SELECT id,item,fecha from lista WHERE status='0'";
    $result=$con->query($query);
    return $result;
}
function get_items_checked()
{
    $con=make_connection();
    $query="SELECT id,item,fecha from lista WHERE status='1'";
    $result=$con->query($query);
    return $result;
}
function update_items($id)
{
    $con=make_connection();
    $query="UPDATE lista set status='1' WHERE id='$id'";
    $result=$con->query($query);
}
function delete_items($id)
{
    $con=make_connection();
    $query="DELETE from lista WHERE id='$id'";
    $result=$con->query($query);
}
?>