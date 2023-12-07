<?php

namespace application\usecase;

use PokemonPort;
use PokemonPresenter;
use port\GetPokemonByNamePort;

include_once "domain/beans/Pokemon.php";
include_once "application/port/PokemonPort.php";
include_once "application/presenter/PokemonPresenter.php";
include_once "presentation/port/GetPokemonByNamePort.php";

class getPokemonByName implements GetPokemonByNamePort {

    private PokemonPort $pokemonPort;
    private PokemonPresenter $pokemonPresenter;

    public function __construct(PokemonPort $pokemonPort, PokemonPresenter $pokemonPresenter) {
        $this->pokemonPort = $pokemonPort;
        $this->pokemonPresenter = $pokemonPresenter;
    }

    public function execute(string $name): false|string {
        $pokemon = $this->pokemonPort->getPokemonByName($name);
        return $this->pokemonPresenter->present($pokemon);
    }

}