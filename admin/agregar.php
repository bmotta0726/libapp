<?php
    require_once('../connection.php');

    if (isset($_POST['submit'])){        
        $nombre =  $_POST['form-nombre'];
        $costo = $_POST['form-costo'];
        $precio =  $_POST['form-precio'];
        $unidadVenta = $_POST['form-unidad'];
        $nombreAlt = $_POST['form-namealt'];
        $size = $_POST['form-tam'];
        $material = $_POST['form-mat'];
        $color = $_POST['form-col'];
        $textura = $_POST['form-tex'];
        $diseno = $_POST['form-dis'];
    
        $insert_query = "INSERT INTO articulo(nombre, costo, precio, unidadVenta, nombreAlt, size, material, color, textura, diseno) 
        VALUES ('$nombre', '$costo', '$precio', '$unidadVenta', '$nombreAlt', '$size', '$material', '$color', '$textura', '$diseno')";

        $add = mysqli_query($conn, $insert_query);

        if($add){
            echo "<script>alert('Se registró nuevo producto')</script>";
        }else{
            echo "<script>alert('ERROR. Producto NO registrado')</script>";
        }

    }

    $conn->close();
?>

<?php 
    $title = "Agregar | ";
    $csslocator = "../";
    include_once('../header.php');
?>
<body>
    <header class="header-principal">
        <a href="../index.php">
            <img class="logo" src="../images/logo.jpeg" alt="Logo">
        </a>        
        <h1>Agregar nuevo producto</h1>    
        <div class="empty-logo-div"></div>
    </header><br><br> 
    <main>
        <div class="div-form">
            <form method="POST" action="agregar.php" class="formAutorizado" autocomplete="off" id="form-agregar">
                <h2>Escribir datos</h2>
                <div class="div-form-field">
                    <label for="form-nombre">Nombre: </label>
                    <input type="text" id="form-nombre" name="form-nombre" required>
                </div>
                <div class="div-form-field">
                    <label for="form-costo">Costo: </label>
                    <input type="text" id="form-costo" name="form-costo">
                </div>
                <div class="div-form-field">
                    <label for="form-precio">Precio de venta: </label>
                    <input type="text" id="form-precio" name="form-precio">
                </div>
                <div class="div-form-field">
                    <label for="form-unidad">Unidad de venta: </label>
                    <input type="text" id="form-unidad" name="form-unidad">
                </div>
                <br>
                <br>
                <div class="div-form-field">
                    <label for="form-namealt">Nombre alterno: </label>
                    <input type="text" id="form-namealt" name="form-namealt">
                </div>
                <div class="div-form-field">
                    <label for="form-tam">Tamaño: </label>
                    <input type="text" id="form-tam" name="form-tam">
                </div>
                <div class="div-form-field">
                    <label for="form-mat">Material: </label>
                    <input type="text" id="form-mat" name="form-mat">
                </div>
                <div class="div-form-field">
                    <label for="form-col">Color: </label>
                    <input type="text" id="form-col" name="form-col">
                </div>
                <div class="div-form-field">
                    <label for="form-tex">Textura: </label>
                    <input type="text" id="form-tex" name="form-tex">
                </div>
                <div class="div-form-field">
                    <label for="form-dis">Diseño: </label>
                    <input type="text" id="form-dis" name="form-dis">
                </div>
                <div class="form-input-button-container">
                    <input class="form-input-button" type="submit" name="submit" value="Agregar">
                </div>
            </form>
        </div>        
    </main>
    <footer>
        <a href="../autorizado.php">
            <button type="button" class="button-main-style">Volver</button>
        </a>
    </footer>
</body>
</html>