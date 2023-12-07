<?php

namespace presentation\controller;

use port\GetPokemonByIdPort;
use port\GetPokemonByNamePort;

include_once("port\GetPokemonByIdPort.php");
include_once("port\GetPokemonByNamePort.php");

class PokemonController {

    private GetPokemonByNamePort $getPokemonByName;
    private GetPokemonByIdPort $getPokemonById;

    public function __construct(GetPokemonByNamePort $getPokemonByName, GetPokemonByIdPort $getPokemonById) {
        $this->getPokemonByName = $getPokemonByName;
        $this->getPokemonById = $getPokemonById;
    }

    public function getPokemonByName(string $name) {
        return $this->getPokemonByName->execute($name);
    }

    public function getPokemonById(int $id) {
        $pokemon = $this->getPokemonById->execute($id);
    }

}