<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/panel.css">
    <title>Panel de Control</title>
</head>
<body>
        <h1>Panel de Noticias</h1>
        <center><a class="agregar" href="formularioNoticia.html"><img src="img/new.png"></a></center>
        <div class="cont-tabla">
                <table>
                        <thead>
                          <tr>
                            <th>Noticias</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>


                        <?php
                            include "conexion.php";
                            $sql = "SELECT * FROM noticias";
                            $resultados = $conexion -> query($sql);

                            while($res = $resultados -> fetch_array(MYSQLI_BOTH) ){
                                echo'
                                <tr>
                                <td>'.$res['titulo'].'</td>
                                
                                
                                <td>
                                    
                                    <a class="icon-edit editar" href="editar.php?id='.$res['id']. '"><img src="img/edit.png"></a>
                                    <a class="icon-trash eliminar" href="eliminar.php?id='.$res['id']. '"><img src="img/delete.png"></a>
                                    
                                </td>
                                </tr>
                                ';
                              }
                         ?>
                </table>
        </div>
    
</body>
</html>