<?php

include '../includes/get_tables.php';
$array = json_decode($JSONarray);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Tables</title>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
<form action="" id="form_data" name="form_data">
    <table>
        <tr>
            <td>Numero</td>
            <td>Nombre tabla</td>
            <td>Api link</td>
            <td>Numero de registros</td>
            <td>Joins</td>
        </tr>
        <?php
        $cont = 0;
        $JSONobjetc = 'Tables_in_' . $db_name;
        foreach ($array as $obj) {
            $cont = $cont + 1;
            $nombre_tabla = $obj->$JSONobjetc;

            //      GET COUNT TOTAL DATA  =====================
            $sqlCountData = 'SELECT COUNT(*) AS id FROM ' . $nombre_tabla;

            $array_count = getArraySQL($sqlCountData);
            $JSONcountArray = json_encode($array_count);
            $arrayCountData = json_decode($JSONcountArray);

            foreach ($arrayCountData as $countObj) {
                $d = '0';
                $countTot = $countObj->$d;
                ?>

                <tr>
                    <td><?php echo $cont; ?></td>
                    <td><?php echo $nombre_tabla . " "; ?></td>
                    <td>
                        <a href="../api/index.php?t=<?php echo $nombre_tabla; ?>"><?php echo $host . '/api/index.php?t=' . $nombre_tabla; ?></a>
                    </td>
                    <td><?php echo $countTot; ?></td>
                    <td><input <?php echo 'onclick="callPHP(\'' . $nombre_tabla . '\')"' ?> type="checkbox"
                                                                                            id="chk_table"
                                                                                            name="<?php echo $nombre_tabla; ?>"
                                                                                            value="<?php echo $nombre_tabla; ?>"/>
                    </td>
                </tr>

            <?php
            }
        } ?>

    </table>

    <div id="array"></div>

    <div id="data_table">
        <div id="button">
            <input type="button" onclick="sendData()" id="send_service" name="send_service" value="Crear servicio"/>
        </div>
    </div>

</form>
</body>
<script type="text/javascript" src="../js/script.js"></script>
</html>