<?php
        require_once('connection.php');

        $query_articles_main = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE comun = '1'";
        $articles_main = mysqli_query($conn, $query_articles_main);

        # Primera tabla a mostrar: Artículos principales
        $search_query = $query_articles_main;

        if (isset($_GET['search'])){
            $search = $_GET['search'];
            //$search_query = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE nombre LIKE '%$search%'";
            $search_query = "SELECT * FROM articulo WHERE nombre LIKE '%$search%'";
        }
        $search_result = mysqli_query($conn, $search_query);
?>

<?php 
    $title = 'Consulta | ';
    $csslocator = '';
    include_once('header.php'); 
?>
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
            <table class="table-standard">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Unidad</th>
                        <th>Precio</th>
                        <th>Detalles</th>
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
                        <td><a href="producto.php?id=<?php echo $row['id']?>"><button class="detalles-button">Ver</button></a></td>
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
    <?php 
        $route = 'index.php';
        include_once('footer.php'); 
    ?>
</body>
</html>