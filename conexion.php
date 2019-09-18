<?php
    $servidor = "localhost";
    $usu = "root";
    $pass = "";
    $bd = "tec";
    $conexion = mysqli_connect($servidor,$usu,$pass,$bd);

    if (!$conexion){
        //echo("Error");
    }
    else{
        //echo("Todo correcto");
    }



?>