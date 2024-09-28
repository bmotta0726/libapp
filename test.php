<?php

    include('connection.php');

    $insert_test_query = "INSERT INTO articulo VALUES (999, 'articulo de prueba', 5, 7, 'unidad prueba', 
    'nombre alt prueba', 'tam grande', '', 'plateado', '', '', 0)";

    $insert_test_query2 = "INSERT INTO articulo(nombre, costo, precio, unidadVenta, nombreAlt, size, material, color, textura, diseno, comun) 
    VALUES ('prueba 3', 15, 17, 'unidad prueba 3', 'nombre alt prueba 3', 'pequeño', 'fino', 'dorado', '', '', 0)";

    $insert_test_query3 = "INSERT INTO articulo(nombre, costo, precio, unidadVenta, nombreAlt, size, material, color, textura, diseno, comun) 
    VALUES ('prueba after A_I', 144, 147, 'unidad prueba 4', 'nombre alt prueba 4', 'pequeño', 'fino', 'dorado', 'aa', 'bb', 0)";

    $insert_test_query4 = "INSERT INTO articulo(nombre, costo, precio, unidadVenta, nombreAlt, size, material, color, textura, diseno, comun) 
    VALUES ('prueba after A_I 2', 244, 247, 'unidad prueba 4', 'nombre alt prueba 4', 'pequeño', 'fino', 'dorado', 'aa', 'bb', 0)";

    $insert_test_query5 = "INSERT INTO articulo(nombre, costo, precio, unidadVenta, nombreAlt, size, material, color, textura, diseno) 
    VALUES ('prueba comun implicito', 4, 87, 'prueba 5', 'nombre alt prueba 5', '', '', '', 'aa', 'bb')";

$insert_test_query6 = "INSERT INTO articulo(nombre, costo, precio, unidadVenta, nombreAlt, size, material, color, textura, diseno) 
    VALUES ('prueba generica', 86, 79, 'prueba 6', 'nombre alt prueba 6', 'ggg', '', '', '', 'bb')";

    $delete_test_query = "DELETE FROM articulo WHERE id = 999";

    if ($conn->query($insert_test_query6) === TRUE){
        echo "Added data";
    }else{
        echo "Error: " .$insert_test_query."<br>".$conn->error;
    }