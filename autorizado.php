<?php 
    $title = 'Autorizado | ';
    $csslocator = '';
    include_once('header.php'); 
?>
<body>
    <header class="header-authorized">
        <h1>Bienvenido</h1>
        <h2>¿Qué desea hacer?</h2>
    </header><br>   
    <div class="auth-buttons-container">
        <a href="admin/agregar.php"><button class="button-auth" id="add-button">Agregar producto</button></a>
        <a href="admin/modificar.php"><button class="button-auth" id="modify-button">Modificar productos</button></a>
        <a href="admin/eliminar.php"><button class="button-auth" id="delete-button">Eliminar productos</button></a><br><br>
        <a href="admin/estadisticas.php"><button class="button-auth" id="stats-button">Ver estadísticas</button></a>
    </div><br><br>
    <div id="button-volver-container">
        <a href="index.php">
            <button class="button-main-style">Volver</button>
        </a>
    </div>
</body>
</html>