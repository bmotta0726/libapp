<?php
    $title = 'Estadísticas | ';
    $csslocator = '../';
    include_once('../header.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Estadísticas | Librería Motta</title>
</head>
<body>
    <header>
        <h1>Estadísticas</h1>
    </header>
    <main>
        <a href="../admin/estadisticas/caros.php"><button class="button-main-style">Productos más caros</button></a>
        <a href="../admin/estadisticas/baratos.php"><button class="button-main-style">Productos más baratos</button></a>
        <a href="../admin/estadisticas/mas_margen.php"><button class="button-main-style">Productos con más margen</button></a>
        <a href="../admin/estadisticas/menos_margen.php"><button class="button-main-style">Productos con menos margen</button></a>
        <a href="../admin/estadisticas/marcas.php"><button class="button-main-style">Lista de marcas</button></a>
        <a href="../autorizado.php"><button class="button-main-style">VOLVER</button></a>
    </main>
</body>
</html>