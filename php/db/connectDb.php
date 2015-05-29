<?php

include("infoDb.php");

try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
