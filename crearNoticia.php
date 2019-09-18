<?php

include "conexion.php";


$titulo = $_POST["titulo"];
$archivo = $_FILES['archivo']['name'];
$cuerpo = $_POST["cuerpo"];
$msj = $_POST["msj"];
$enlace = $_POST["enlace"];


  
  //  Primero Subimos el archivo
  $nombre=$_FILES['archivo']['name'];
  $guardado=$_FILES['archivo']['tmp_name'];
  
  if(!file_exists('archivos')){
      mkdir('archivos',0777,true);
      if(file_exists('archivos')){
          if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
              //echo "Archivo guardado con exito";
          }else{
              //echo "Archivo no se pudo guardar";
          }
      }
  }else{
      if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
          //echo "Archivo guardado con exito";
      }else{
          //echo "Archivo no se pudo guardar";
      }
  } 

  // Despues Hacemos el Registro 
  $insert = "INSERT INTO `noticias`(`id`, `titulo`, `archivo`, `noticia`, `msj`, `enlace`) VALUES ('null','$titulo','$archivo','$cuerpo','$msj','$enlace')";
  $resultado = mysqli_query($conexion,$insert);

  if(!$resultado){
    echo("No se registro");
}
else{
    echo("usuario se registro");
}

  header('Location: '.$uri.'index.php');
?>