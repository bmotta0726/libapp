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
    <title>Marcas | Librería Motta</title>
</head>
<body>
    <header>
        <h2>MARCAS MÁS COMUNES</h2>
    </header>
    <main>
        <?php
        if(mysqli_num_rows($marcas)>0){
        ?>
            <table class="table-standard">
                <thead>
                    <tr>
                        <th>Marca</th>
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
    <?php
        $route = '../estadisticas.php';
        include_once('../../footer.php')
    ?>
</body>
</html>