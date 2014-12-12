<?php

include '../includes/get_tables.php';

$data = $_GET['data'];
$dataTables = $_GET['dataTables'];


$jsonData = json_decode($data, true);
$jsonDataTables = json_decode($dataTables, true);


$sql = "SELECT * FROM ";

for ($i = 0; $i < count($jsonDataTables); $i++) {
    if ($i < count($jsonDataTables) - 1) {
        $sql .= $jsonDataTables[$i] . ", ";
    } else {
        $sql .= $jsonDataTables[$i] . " ";
    }
}

for ($i = 0; $i < count($jsonData); $i++) {
    if ($i == 0) {
        $sql .= "WHERE " . $jsonData[$i] . " = " . $jsonData[$i + 1];
    } else {
        $sql .= " AND " . $jsonData[$i] . " = " . $jsonData[$i - 1];
    }
}

$array = getArraySQL($sql);
$JSONarray = json_encode($array);

echo $JSONarray;








