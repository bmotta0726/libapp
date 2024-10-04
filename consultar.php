<?php
        require_once('connection.php');

        #$search_query = "SELECT id, nombre, precio FROM articulo";
        #$search_query = $query_articles_main;

        #$query_articles = "SELECT id, nombre, unidadVenta, precio FROM articulo";
        #$query_categories = "SELECT id, nombreCategoria FROM categoria";
        #$query_articles_main = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE comun = '1'";
    
        #$articulos_todos = mysqli_query($conn, $query_articles);
        #$categorias_todas = mysqli_query($conn, $query_categories);

        $query_articles_main = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE comun = '1'";
        $articles_main = mysqli_query($conn, $query_articles_main);

        # Primera tabla a mostrar: Artículos principales
        $search_query = $query_articles_main;

        if (isset($_GET['search'])){
            $search = $_GET['search'];
            $search_query = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE nombre LIKE '%$search%'";
        }
        $search_result = mysqli_query($conn, $search_query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Precios | Librería Motta</title>
</head>
<body>
    <header class="header-principal">
        <a href="index.php">
            <img class="logo" src="images/logo.jpeg" alt="Logo">
        </a>        
        <h1>LIBRERÍA MOTTA</h1>    
        <div class="empty-logo-div"></div>
    </header><br><br>
    <main>
        <div class="search-bar">
            <form method="GET" action="consultar.php">
                <!--<input type="text">-->
                <input type="search" name="search" placeholder="Buscar por nombre">
                <button type="submit" class="search-button">Buscar</button>
                <a href="consultar.php">
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
                <?php while($row = mysqli_fetch_assoc($search_result)){
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['unidadVenta'] ?></td>
                        <td class="td-price"><?php echo $row['precio'] ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        <?php
        }else{
            echo "<h2>SIN RESULTADOS</h2>";
        }
        ?>
    </main>
</body>
</html>