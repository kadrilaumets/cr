<?php

$db_server = 'db';
$db_andmebaas = 'autorent';
$db_kasutaja = 'root';
$db_salasona = 'Passw0rd';

$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);

if (!$yhendus) {
    die('Ei saa ühendust andmebaasiga');
}

?>