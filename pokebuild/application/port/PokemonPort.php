<?php

include_once "domain/beans/Pokemon.php";

interface PokemonPort {

    public function getPokemonByName(string $name): Pokemon|null;

    public function getPokemonById(int $id): Pokemon|null;

}