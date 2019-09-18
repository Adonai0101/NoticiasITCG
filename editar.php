<?php 
    include("conexion.php");
/*Obtenemos datos y los mostramos despues */
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query =  "SELECT * FROM noticias where id = $id";
        $resultado = mysqli_query($conexion,$query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_array($resultado);
            $id = $row['id'];
            $titulo = $row['titulo'];
            $archivo = $row['archivo'];
            $noticia = $row['noticia'];
            $msj = $row['msj'];
            $enlace = $row['enlace'];
            

        }
    }

    /* Recibimos los datos  */
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $archivo  = $_POST['archivo'];
        $noticia = $_POST['noticia'];
        $msj = $_POST['msj'];
        $enlace = $_POST['enlace'];
        

        $sql = "UPDATE noticias SET titulo = '$titulo',archivo = '$archivo',noticia = '$noticia',msj = '$msj',enlace = '$enlace' where id = '$id'";
        mysqli_query($conexion,$sql);
        header("Location: index.php");
        echo "No se que pedo esta pasando";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>Noticias</title>
</head>
<body>
        <header class="completo">
                <img src="img/pagina_head.png" alt="">
                <h1>Editar Noticia</h1>
        </header>
    <div class="cont">
            
    <form action="editar.php?id=<?php echo $_GET['id']?>" method="POST" enctype="multipart/form-data">> 
            <div class="completo cont-titulo">
                <h1>Titulo</h1>
                <input value = "<?php echo $titulo ?>" name="titulo" type="text" placeholder="Titulo de la noticia">
            </div>
            
            <div class="cont-subirFoto">
                <h1>Subir Foto</h1>
                <input value = "<?php echo "archivos/" . $archivo?>"  name="archivo" type="file" >
                <h1>Foto anterior</h1>
                <img src="<?php echo "archivos/" . $archivo?>" >
            </div>

            <div class="cont-noticia">
                <h1>Cuerpo de la Noticia</h1>
                <textarea name="cuerpo" name="" id="" cols="30" rows="10">
                    <?php echo $noticia ?>
                </textarea>
            </div>

            <div class="completo cont-enlaces">
                <h1>Enlaces</h1>
                <input value = "<?php echo $msj?>" name="msj" type="text" placeholder="Mensaje">
                <input value = "<?php echo $enlace ?>"name="enlace" type="text"  placeholder="URL ejem( www.itcg.edu.mx)">
            </div>
        
            <div class="completo cont-botones">
            <button name = "update" class = "boton">Modificar</button>
                <input type="reset" value="Limpiar">
                <a class="btn-cancelar" href="index.php">Cancelar</a>
            </div>
        </form>

    </div>
   
    
</body>
</html>