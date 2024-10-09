<?php
    require_once('connection.php');

    if(isset($_GET)){
        $id = $_GET['id'];

        $search_query = "SELECT * FROM articulo WHERE id = '$id'";

        $result = mysqli_query($conn, $search_query);

        if($result){
            $row = mysqli_fetch_assoc($result);

            $idd = $row['id'];
            $nombre =  $row['nombre'];
            //$costo = $row['costo'];
            $precio =  $row['precio'];
            $unidadVenta = $row['unidadVenta'];
            $nombreAlt = $row['nombreAlt'];
            $tamano = $row['size'];
            $material = $row['material'];
            $color = $row['color'];
            $textura = $row['textura'];
            $diseno = $row['diseno'];
        }else{
            echo "<h2>NO SE ENCONTRO ARTICULO</h2>";
        }        
    }
?>

<?php
    $title = 'Detalles del producto | ';
    $csslocator = '';
    include_once('header.php');
?>

<body>
    <header class="header-principal">
        <a href="index.php">
            <img class="logo" src="images/logo.jpeg" alt="Logo">
        </a>        
        <h1>Detalles del producto</h1>    
        <div class="empty-logo-div"></div>
    </header><br><br>
    <main>
        <form action="" class="formAutorizado">
            <div>
                <label for="">Nombre:</label><br>
                <p><?php echo "$nombre"?></p>
            </div>
            <div>
                <label for="">Nombre alternativo: -</label><br>
                <p><?php echo "$nombreAlt"?></p>
            </div>
            <div>
                <label for="">Precio</label><br>
                <p for=""><?php echo "$precio"?></p>
            </div>
            <div>
                <label for="">Unidad de venta:</label><br>
                <p for=""><?php echo "$unidadVenta"?></p>
            </div>
            <div>
                <label for="">Tamaño: -</label><br>
                <p for=""><?php echo "$tamano"?></p>
            </div>
            <div>
                <label for="">Material: -</label><br>
                <p><?php echo "$material"?></p>
            </div>
            <div>
                <label for="">Color: -</label><br>
                <p><?php echo "$color"?></p>
            </div>
            <div>
                <label for="">Textura: -</label><br>
                <p><?php echo "$textura"?></p>
            </div>
            <div>
                <label for="">Diseño: -</label><br>
                <p><?php echo "$diseno"?></p>
            </div>
        </form>
    </main><br>
    <?php
        $route = 'consultar.php';
        include_once('footer.php');
    ?>
</body>
</html>