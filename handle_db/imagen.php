<?php
if ($_SERVER["REQUEST_METHOD"]=== "POST" ){

    $img_blob = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    require_once($_SERVER["DOCUMENT_ROOT"] . "/configuracion/data.php");
    $mysqli->query("INSERT INTO usuarios(imagen) VALUES ('$img_blob')");
}