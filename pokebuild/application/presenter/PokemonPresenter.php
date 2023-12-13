<?php

include_once "domain/beans/Pokemon.php";
include_once "domain/service/PokemonService.php";

class PokemonPresenter {

    private PokemonService $pokemonService;

    public function __construct(PokemonService $pokemonService) {
        $this->pokemonService = $pokemonService;
    }

    public function present(Pokemon $pokemon) {
        return json_encode($this->pokemonService->convertPokemonToArray($pokemon));
    }

    public function presentAll(array $pokemons) {
        $presentedPokemons = [];

        foreach ($pokemons as $pokemon) {
            $presentedPokemons[] = $this->pokemonService->convertPokemonToArray($pokemon);
        }

        return json_encode($presentedPokemons);
    }

}