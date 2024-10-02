<?php
    require_once('../connection.php');

    $search_result = null;

    if (isset($_GET['search'])){
        $search = $_GET['search'];
        $article_id = $search;
        $select_query = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE id = '$article_id'";
        $search_result = mysqli_query($conn, $select_query);        

        $delete_query = "DELETE FROM articulo WHERE id = '$article_id'";
    }else{
        $article_id = null;
    }    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Eliminar producto | Librería Motta</title>
</head>
<body>
    <header class="header-principal">
        <a href="../index.php">
            <img class="logo" src="../images/logo.jpeg" alt="Logo">
        </a>        
        <h1>Eliminar un producto</h1>    
        <div class="empty-logo-div"></div>
    </header><br><br> 
    <div class="search-bar">
        <form method="GET" action="eliminar.php">
            <!--<input type="text">-->
            <input type="search" name="search" placeholder="Ingrese código del producto">
            <button type="submit" class="search-button">Buscar</button>
            <a href="eliminar.php">
                <button type="button" class="clean-button">Limpiar</button>
            </a>
        </form>                
    </div><br><br>

    <?php
        if (mysqli_num_rows($search_result)>0){
    ?>                        
            <table class="mainTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Unidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                <?php $row = mysqli_fetch_assoc($search_result);
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['unidadVenta'] ?></td>
                        <td class="td-price"><?php echo $row['precio'] ?></td>
                    </tr>
                </tbody>            
            </table>
            <div>
                <input class="button-main-style button-delete" type="submit" name="submit" value="Eliminar">
            </div>            
            <?php                
        }else{
            echo "<h2>SIN RESULTADOS</h2>";
        }
    ?>
</body>
</html>