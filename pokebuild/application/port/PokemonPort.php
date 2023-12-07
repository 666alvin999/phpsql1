<?php

use domain\beans\Pokemon;

include_once "domain/beans/Pokemon.php";

interface PokemonPort {

    public function getPokemonByName(string $name): Pokemon;

    public function getPokemonById(int $id): Pokemon;

    public function getKnownPokemonById(int $id): Pokemon;

    public function getKnownPokemonByName(string $name): Pokemon;

}