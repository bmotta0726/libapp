<?php
    require_once('../../connection.php');

    $query_marcas = "SELECT nombreMarca FROM marca";
    $marcas = mysqli_query($conn, $query_marcas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Productos con más margen</title>
</head>
<body>
    <header>
        <h2>PRODUCTOS CON MÁS MARGEN</h2>
    </header>
    <main>
        <?php
        if(mysqli_num_rows($marcas)>0){
        ?>
            <table class="mainTable">
                <thead>
                    <tr>
                        <td>Marca</td>
                    </tr>
                </thead>
                <tbody>
            <?php
            while($row = mysqli_fetch_assoc($marcas)){
            ?> 
                
                    <tr>
                        <td><?php echo $row['nombreMarca']?></td>                        
                    </tr>                
            <?php
            }
            ?>  </tbody>
            </table>
        <?php            
        }else{
            echo "<h2>SIN RESULTADOS PARA MOSTRAR</h2>";
        }
        ?>
    </main>
    <footer>
        <a href="../estadisticas.php"><button type="button" class="button-main-style">Volver</button></a>
    </footer>
</body>
</html>