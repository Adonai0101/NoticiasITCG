<?php

echo "Estas en Eliminar";
include "conexion.php";

if(isset($_GET['id'])) {
    echo "hola";
    $id = $_GET['id'];
    echo $id;
    $sql ="DELETE FROM `noticias` WHERE id = $id";
    $res = mysqli_query($conexion,$sql);
    header('Location: '.$uri.'index.php');
}

?>