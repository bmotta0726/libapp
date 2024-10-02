<?php

    $SERVER = '127.0.0.1:3307';
    $USER = 'root';
    $PASSWORD = '';
    $DB = 'libmotta';

    //$mysqli = new mysqli($HOST, $USER, $PASSWORD, $DB);
    $conn = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);
    
    /*if($conn){
        echo "Connection successful";
    }else{
        echo "Failed to connect to MySQL";
    }*/

    /*$query_articulos = "SELECT id, nombre, unidadVenta, precio FROM articulo";
    $query_categorias = "SELECT id, nombreCategoria FROM categoria";
    $query_articles_main = "SELECT id, nombre, unidadVenta, precio FROM articulo WHERE comun = '1'";
    
    $articulos_todos = mysqli_query($conn, $query_articulos);
    $categorias_todas = mysqli_query($conn, $query_categorias);

    $articles_main = mysqli_query($conn, $query_articles_main)*/


    /*if(mysqli_num_rows($result)>1){
        echo "<br> ID  -  CATEGORIA " . "<br>";
        while($row = mysqli_fetch_assoc($result)){
            echo $row["id"]. "  -  " . $row["nombreCategoria"]. "<br>";
        }
    }else{
        echo "No results found in query";
    }*/
?>