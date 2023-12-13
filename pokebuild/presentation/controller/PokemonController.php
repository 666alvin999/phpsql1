<?php

include_once "presentation/port/GetPokemonByIdPort.php";
include_once "presentation/port/GetPokemonByNamePort.php";
include_once "presentation/port/GetAllPokemonsPort.php";

class PokemonController {

    private GetPokemonByNamePort $getPokemonByName;
    private GetAllPokemonsPort $getAllPokemons;
    private GetPokemonByIdPort $getPokemonById;

    public function __construct(GetPokemonByNamePort $getPokemonByName, GetAllPokemonsPort $getAllPokemons, GetPokemonByIdPort $getPokemonById) {
        $this->getPokemonByName = $getPokemonByName;
        $this->getAllPokemons = $getAllPokemons;
        $this->getPokemonById = $getPokemonById;
    }

    public function getPokemonByName(string $name) {
        return $this->getPokemonByName->execute($name);
    }

    public function getAllPokemons() {
        return $this->getAllPokemons->execute();
    }

    public function getPokemonById(int $id) {
        $pokemon = $this->getPokemonById->execute($id);
    }

}