<?php

include 'config.php';

function connectDB() {
    $conexion = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['db_name']);
    if (!$conexion) {
//        echo 'Ha sucedido un error inesperado en la conexión de la base de datos';
    }
    return $conexion;
}

function disconnectDB($conexion) {
    $close = mysqli_close($conexion);
    if ($close) {
//        echo 'Ha sucedido un error inesperado en la desconexión de la base de datos';
    }
    return $close;
}

function getArraySQL($sql) {
    $conexion = connectDB();
    mysqli_set_charset($conexion, "utf8");
    if (!$result = mysqli_query($conexion, $sql)) die();
    $rawdata = array();
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $rawdata[$i] = $row;
        $i++;
    }
    disconnectDB($conexion);
    return $rawdata;
}

$sql = "SHOW TABLES FROM $db_name";

$array = getArraySQL($sql);
$JSONarray = json_encode($array);



