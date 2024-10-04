<?php
    require_once('../connection.php');

    $search_result = 0;
    $delete_query = "";

    if (isset($_GET['search'])){
        $search = $_GET['search'];
        $article_id = $search;
        $select_query = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE id = '$article_id'";
        $search_result = mysqli_query($conn, $select_query);        

        $delete_query = "DELETE FROM articulo WHERE id = '$article_id'";
    }else{
        $article_id = null;
    }

    if (isset($_POST['submit'])){
        //$submit = $_POST['submit'];

        if ($delete_query != ""){
            $delete = mysqli_query($conn, $delete_query);
        }

        if($delete){
            echo "<script>alert('Se eliminó producto')</script>";
        }else{
            echo "<script>alert('ERROR. Producto NO pudo ser eliminado')</script>";
        }
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
        if ($search_result instanceof mysqli_result){
            if (mysqli_num_rows($search_result)>0){
        //if ($search_result != 0){
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
            <form method="POST">
                <input class="button-main-style button-delete" type="submit" name="submit" value="Eliminar">
            </form>            
            <?php                
        }else{
            echo "<h2>SIN RESULTADOS</h2>";
        }
    }
    ?>
</body>
</html>