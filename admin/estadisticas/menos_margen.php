<?php
    require_once('../../connection.php');

    $query_margin = "SELECT id, nombre, precio, (precio - costo) AS margin FROM articulo ORDER BY margin ASC LIMIT 15";
    $margin = mysqli_query($conn, $query_margin);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Productos con menos margen</title>
</head>
<body>
    <header>
        <h2>PRODUCTOS CON MENOS MARGEN</h2>
    </header>
    <main>
        <?php
        if(mysqli_num_rows($margin)>0){
        ?>
            <table class="mainTable">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Artículo</td>
                        <td>Precio</td>
                        <td>Margen</td>
                    </tr>
                </thead>
                <tbody>
            <?php
            while($row = mysqli_fetch_assoc($margin)){
            ?> 
                
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['precio']?></td>
                        <td><?php echo $row['margin']?></td>
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
    <div id="button-volver-container">
        <a href="../estadisticas.php">
            <button class="button-main-style">Volver</button>
        </a>
    </div>
</body>
</html>