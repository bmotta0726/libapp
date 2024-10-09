<?php 
    require_once('../connection.php');

    $search_result = "";

    if (isset($_GET['search'])){
        $search = $_GET['search'];
        $search_query = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE nombre LIKE '%$search%'";
        $search_result = mysqli_query($conn, $search_query);
    }
    
?>

<?php
    $title = 'Modificar | ';
    $csslocator = '../';
    include_once('../header.php');    
?>

<body>
    <header class="header-principal">
        <a href="../index.php">
            <img class="logo" src="../images/logo.jpeg" alt="Logo">
        </a>        
        <h1>Modificar un producto</h1>    
        <div class="empty-logo-div"></div>
    </header><br><br>
    <main>
        <div class="search-bar">
            <form method="GET" action="modificar.php">
                <!--<input type="text">-->
                <input type="search" name="search" placeholder="Buscar por nombre">
                <button type="submit" class="search-button">Buscar</button>
                <a href="modificar.php">
                    <button type="button" class="clean-button">Limpiar</button>
                </a>
            </form>                
        </div><br><br>
        <?php 
            if($search_result instanceof mysqli_result){
                if(mysqli_num_rows($search_result)>0){
                    ?>
                    <table class="table-standard">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Unidad</th>
                                <th>Precio</th>
                                <th>Cambiar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_assoc($search_result)){
                        ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['unidadVenta'] ?></td>
                                <td><?php echo $row['precio'] ?></td>  
                                <td><a href="modificar_producto.php?id=<?php echo $row['id']?>"><button class="cambiar-button">Cambiar</button></a></td>
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
            }
        ?>
    </main>
    <?php
        $route = '../autorizado.php';
        include_once('../footer.php');
    ?>

</body>
</html>