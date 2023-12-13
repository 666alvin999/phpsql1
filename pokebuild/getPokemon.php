<?php

require_once("PokemonControllerInitializer.php");

$controller = PokemonControllerInitializer::initController();

if (array_key_exists("name", $_GET) && is_numeric(['name'])) {
    echo $controller->getPokemonById((int)$_GET['name']);
} else if (array_key_exists("name", $_GET)) {
    echo $controller->getPokemonByName($_GET['name']);
} else if (array_key_exists("type", $_GET)) {
    echo $controller->getPokemonByType($_GET['type']);
} else if (array_key_exists("gen", $_GET)) {
    echo $controller->getPokemonByGen((int)$_GET['gen']);
}
else {
    echo $controller->getAllPokemons();
}





