<?php

require 'vendor/autoload.php';

$cliente = new MongoDB\Client("mongodb://localhost:27017");
$db = $cliente->RedSocial;

?>