<?php
    require_once('../connection.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $search_query = "SELECT * FROM articulo WHERE id = '$id'";

        $result = mysqli_query($conn, $search_query);

        if($result){
            $row = mysqli_fetch_assoc($result);
        }else{
            echo "<h2>NO SE ENCONTRO ARTICULO</h2>";
        }
    }

    /** **/

    if(isset($_POST['submit'])){

        if(isset($_GET['idd'])){
            $idd = $_GET['idd'];
        }

        $nombre =  $_POST['form-nombre'];
        $costo = $_POST['form-costo'];
        $precio =  $_POST['form-precio'];
        $unidadVenta = $_POST['form-unidad'];
        $nombreAlt = $_POST['form-namealt'];
        $size = $_POST['form-tam'];
        $material = $_POST['form-mat'];
        $color = $_POST['form-color'];
        $textura = $_POST['form-textura'];
        $diseno = $_POST['form-diseno'];

        $modify_query = "UPDATE articulo SET nombre = '$nombre', costo = '$costo', precio = '$precio', 
        unidadVenta = '$unidadVenta', nombreAlt = '$nombreAlt', size = '$size', material = '$material', 
        color = '$color', textura = '$textura', diseno = '$diseno' WHERE id = $idd";

        $action = mysqli_query($conn, $modify_query);

        if($action){
            echo "<script>alert('¡ARTICULO MODIFICADO!')</script>";
        }else{
            echo "<script>alert('ERROR. NO SE PUDO MODIFICAR EL ARTICULO')</script>";
        }
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
        <h1>Modificar producto</h1>    
        <div class="empty-logo-div"></div>
    </header><br><br>
    <main>
        <div class="div-form">
            <form method="POST" action="modificar_producto.php?idd=<?php echo $id?>" class="formAutorizado" autocomplete="off" id="form-modificar">
                <h2>Cambiar datos del artículo</h2>
                <div class="form-field">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="form-nombre" value="<?php echo $row['nombre']?>">
                </div>
                <div class="form-field">
                    <label for="costo">Costo (s/): </label>
                    <input type="number" min="0" name="form-costo" step="0.01" value="<?php echo $row['costo']?>">
                </div>
                <div class="form-field">
                    <label for="precio">Precio de venta (s/): </label>
                    <input type="number" min="0" name="form-precio" step="0.01" value="<?php echo $row['precio']?>">
                </div>
                <div class="form-field">
                    <label for="unidad">Unidad de venta: </label>
                    <input type="text" name="form-unidad" value="<?php echo $row['unidadVenta']?>">
                </div>            
                <div class="form-field">
                    <label for="namealt">Nombre alternativo: </label>
                    <input type="text" name="form-namealt" value="<?php echo $row['nombreAlt']?>">
                </div>
                <div class="form-field">
                    <label for="tam">Tamaño: </label>
                    <input type="text" name="form-tam" value="<?php echo $row['size']?>">
                </div>            
                <div class="form-field">
                    <label for="mat">Material: </label>
                    <input type="text" name="form-mat" value="<?php echo $row['material']?>">
                </div>
                <div class="form-field">
                    <label for="color">Color: </label>
                    <input type="text" name="form-color" value="<?php echo $row['color']?>">
                </div>   
                <div class="form-field">
                    <label for="textura">Textura: </label>
                    <input type="text" name="form-textura" value="<?php echo $row['textura']?>">
                </div>
                <div class="form-field">
                    <label for="diseno">Diseño: </label>
                    <input type="text" name="form-diseno" value="<?php echo $row['diseno']?>">
                </div>
                <br>
                <div class="form-input-button-container">
                    <input class="form-input-button" type="submit" name="submit" value="Modificar">
                </div>
            </form>
        </div>        
    </main>
    <footer>
        <a href="modificar.php">
            <button type="button" class="button-main-style">VOLVER</button>
        </a>
    </footer>
</body>
</html>