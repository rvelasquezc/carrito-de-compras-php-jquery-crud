<?php 
include '../conexion.php';
session_start();
// guardamos el contenido de la sesión en una variable
$arreglo = $_SESSION['carrito'];
$numeroventa = 0;

// acabamos de tocar el botón comprar, desde el punto de vista de la administración es una venta 
// el objetivo es ponerle un mismo número de venta a todos los productos vendidos en esa compra

// obtengo el último número-de-venta almacenado
$resultado = mysqli_query($con,"select * from compras order by numeroventa DESC limit 1") or die(mysqli_error());

// paso el número-de-venta a una variable
while ($f = mysqli_fetch_array($resultado)){

	$numeroventa = $f['numeroventa'];
}

// si es la primera venta realizada, le ponemos el número-de-venta 1
if ($numeroventa == 0) {

	$numeroventa = 1;

// si no es la primera, le sumamos uno
}else{

    $numeroventa++;

}

//Insertar productos
