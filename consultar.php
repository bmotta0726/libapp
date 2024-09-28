<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Precios | Librería Motta</title>
</head>
<body>
    <?php
        include 'connection.php';

        #$search_query = "SELECT id, nombre, precio FROM articulo";
        $search_query = $query_articles_main;

        if (isset($_GET['search'])){
            $search = $_GET['search'];
            $search_query = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE nombre LIKE '%$search%'";
        }
        $search_result = mysqli_query($conn, $search_query);
    ?>
    <header class="header-principal">
        <a href="index.php">
            <img class="logo" src="images/logo.jpeg" alt="Logo">
        </a>        
        <h1>LIBRERÍA MOTTA</h1>    
        <div class="empty-logo-div"></div>
    </header><br><br>
    <div class="search-bar">
        <form method="GET" action="consultar.php">
            <!--<input type="text">-->
            <input type="search" name="search" placeholder="Buscar por nombre">
            <button type="submit" class="search-button">Buscar</button>
            <a href="consultar.php">
                <button type="button" class="clean-button">Limpiar</button>
            </a>
        </form>                
    </div>
    <br><br>
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
            <?php
            if (mysqli_num_rows($search_result)>0){
                while($row = mysqli_fetch_assoc($search_result)){
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['unidadVenta'] ?></td>
                        <td class="td-price"><?php echo $row['precio'] ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
    </body>
</html>