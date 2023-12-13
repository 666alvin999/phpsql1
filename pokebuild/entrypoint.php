<?php

require_once("PokemonControllerInitializer.php");

$controller = PokemonControllerInitializer::initController();

if (array_key_exists("name", $_GET)) {
    echo $controller->getPokemonByName($_GET['name']);
}
else {
    echo $controller->getAllPokemons();
}





