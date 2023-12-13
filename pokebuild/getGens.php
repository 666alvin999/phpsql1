<?php

require_once("PokemonControllerInitializer.php");

$controller = PokemonControllerInitializer::initController();

echo $controller->getPokemonAllGens();