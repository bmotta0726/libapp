<?php 
    require_once('../connection.php');

    if(isset($_POST['submit'])){
        $brand_name = $_POST['form-nombre-marca'];
        $newbrand_query = "INSERT INTO marca(nombreMarca) VALUES('$brand_name')";
        
        if(mysqli_query($conn, $newbrand_query)){
            echo "<script>alert('Se registró NUEVA MARCA')</script>";
        }else{

            //echo "<script>alert('ERROR.No se pudo registrar')</script>";
            if (mysqli_errno($conn) == 1062) {
                echo "<script>alert('ERROR. La MARCA que quiere registrar YA EXISTE')</script>";
            } else {
                echo "<script>alert('Ha ocurrido un error inesperado. Intente otra vez.')</script>";
            } 
        }
    }

    $conn -> close();
?>

<?php 
    $title = "Nueva marca | ";
    $csslocator = "../";
    include_once('../header.php');
?>
<body>
    <header class="header-principal">
        <a href="../index.php">
            <img class="logo" src="../images/logo.jpeg" alt="Logo">
        </a>        
        <h1>Agregar nueva marca</h1>    
        <div class="empty-logo-div"></div>
    </header><br><br>     
    <main>
        <div class="div-form">
            <form method="POST" action="agregar_marca.php" class="formAutorizado" autocomplete="off" id="form-agregar">
                <h2>Nombre de la marca</h2>
                <div class="div-form-field">
                    <label for="form-nombre-marca">Nombre: </label>
                    <input type="text" id="form-nombre-marca" name="form-nombre-marca" required>
                </div>
                <div class="form-input-button-container">
                    <input class="form-input-button" type="submit" name="submit" value="Agregar">
                </div>
            </form>
        </div>        
    </main>
    <?php
        $route = '../autorizado.php';
        include_once('../footer.php');
    ?>
</body>