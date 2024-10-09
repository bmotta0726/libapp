<?php
    require_once('../../connection.php');

    $query_baratos = "SELECT id, nombre, precio FROM articulo ORDER BY precio ASC LIMIT 15";
    $baratos = mysqli_query($conn, $query_baratos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Productos más baratos</title>
</head>
<body>
    <header>
        <h2>PRODUCTOS MÁS BARATOS</h2>
    </header>
    <main>
        <?php
        if(mysqli_num_rows($baratos)>0){
        ?>
            <table class="table-standard">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Artículo</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            while($row = mysqli_fetch_assoc($baratos)){
            ?> 
                
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['precio']?></td>
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
    <?php
        $route = '../estadisticas.php';
        include_once('../../footer.php')
    ?>
</body>
</html>