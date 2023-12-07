<?php

use domain\beans\Pokemon;

include_once "domain/beans/Pokemon.php";

class PokemonPresenter {

    private PokemonService $pokemonService;

    public function __construct(PokemonService $pokemonService) {
        $this->pokemonService = $pokemonService;
    }

    public function present(Pokemon $pokemon) {
        return json_encode($this->pokemonService->convertPokemonToArray($pokemon));
    }

}