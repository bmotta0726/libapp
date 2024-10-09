<?php
    require_once('../../connection.php');

    $query_caros = "SELECT id, nombre, precio FROM articulo ORDER BY precio DESC LIMIT 15";
    $caros = mysqli_query($conn, $query_caros);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Productos más caros</title>
</head>
<body>
    <header>
        <h2>PRODUCTOS MÁS CAROS</h2>
    </header>
    <main>
        <?php
        if(mysqli_num_rows($caros)>0){
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
            while($row = mysqli_fetch_assoc($caros)){
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