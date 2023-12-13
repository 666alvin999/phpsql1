<?php

include_once "domain/beans/Pokemon.php";
include_once "domain/port/PokemonPresenterPort.php";
include_once "application/mapper/PokemonMapper.php";

class PokemonPresenter implements PokemonPresenterPort {

    private PokemonMapper $pokemonService;

    public function __construct(PokemonMapper $pokemonService) {
        $this->pokemonService = $pokemonService;
    }

    public function present(Pokemon $pokemon): false|string {
        return json_encode($this->pokemonService->convertPokemonToArray($pokemon));
    }

    public function presentAll(array $pokemons): false|string {
        $presentedPokemons = [];

        foreach ($pokemons as $pokemon) {
            $presentedPokemons[] = $this->pokemonService->convertPokemonToArray($pokemon);
        }

        return json_encode($presentedPokemons);
    }

}