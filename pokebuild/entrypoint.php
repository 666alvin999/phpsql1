<?php

require_once("PokemonControllerInitializer.php");

$controller = PokemonControllerInitializer::initController();

if ($_GET['name']) {
    echo $controller->getPokemonByName('Gruikui');
}
else {
    echo $controller->getAllRegisteredPokemon();
}





