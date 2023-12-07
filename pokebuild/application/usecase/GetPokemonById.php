<?php

namespace application\usecase;

use PokemonPort;
use PokemonPresenter;
use port\GetPokemonByIdPort;

include_once "domain/beans/Pokemon.php";
include_once "application/port/PokemonPort.php";
include_once "application/presenter/PokemonPresenter.php";
include_once "presentation/port/GetPokemonByIdPort.php";

class GetPokemonById implements GetPokemonByIdPort {

    private PokemonPort $pokemonPort;
    private PokemonPresenter $pokemonPresenter;

    public function __construct(PokemonPort $pokemonPort, PokemonPresenter $pokemonPresenter) {
        $this->pokemonPort = $pokemonPort;
        $this->pokemonPresenter = $pokemonPresenter;
    }

    public function execute(int $id): array {
        $pokemon = $this->pokemonPort->getPokemonById($id);
        return $this->pokemonPresenter->present($pokemon);
    }

}