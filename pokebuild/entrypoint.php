<?php

require_once("PokemonControllerInitializer.php");

$controller = PokemonControllerInitializer::initController();

if ($_GET['name']) {
    echo $controller->getPokemonByName($_GET['name']);
}
else {
    echo 'vonjour';
}





