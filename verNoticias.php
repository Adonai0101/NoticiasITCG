<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/ver.css">
    <title>Document</title>
</head>
<body>

    <?php 

        include "conexion.php";
        $sql = 'SELECT * FROM `noticias` ORDER by  id DESC';
        $resultados = $conexion -> query($sql);

        while($res = $resultados -> fetch_array(MYSQLI_BOTH) ){

            /* Se hace una validacion para mostrar las noticias */

            if ($res['archivo'] == "" && $res['msj']  == ""){
                echo '
                <h1 class="titulo">'.$res['titulo'].'</h1>
                <hr class="separador">
                
                <div class="cont">
                    <div class="cuerpo">
                        <p>'.$res['noticia'].'</p>
                    </div>
                    
                </div>
                ';
            }
            else{
                
                if ($res['archivo'] == "" ){
                    echo '
                    <h1 class="titulo">'.$res['titulo'].'</h1>
                    <hr class="separador">
                    
                    <div class="cont">
            
                        <div class="cuerpo">
                            <p>'.$res['noticia'].'</p>
                            <a href="'.$res['enlace'].'" target="_blank"> '.$res['msj']. '</a>
                        </div>
                           
                    </div>
    
                 ';
                }
                elseif($res['msj'] == ""){
                    echo '
                    <h1 class="titulo">'.$res['titulo'].'</h1>
                    <hr class="separador">
                    
                    <div class="cont">
            
                        <div class="foto">
                            <img src="archivos/'.$res['archivo'].'">
                        </div>
    
                        <div class="cuerpo">
                            <p>'.$res['noticia'].'</p>
                            
                        </div>
                        
                    </div>
    
                    ';
                
                }
                else{
                        /* Mostramos todos los datos si los datos se Metieron Completos */
                        echo '
                        <h1 class="titulo">'.$res['titulo'].'</h1>
                        <hr class="separador">
                        
                        <div class="cont">
                
                            <div class="foto">
                                <img src="archivos/'.$res['archivo'].'">
                            </div>
    
                            <div class="cuerpo">
                                <p>'.$res['noticia'].'</p>
                            
                                <a href="'.$res['enlace'].'" target="_blank"> '.$res['msj']. '</a>
                            </div>
                            
                        </div>
    
                        ';
                }
                }
            }

           

            
    ?>
    
</body>
</html>