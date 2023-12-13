<?php

class GetAllPokemons {

    private PokemonPort $pokemonPort;
    private PokemonPresenter $pokemonPresenter;

    public function __construct(PokemonPort $pokemonPort, PokemonPresenter $pokemonPresenter) {
        $this->pokemonPort = $pokemonPort;
        $this->pokemonPresenter = $pokemonPresenter;
    }

    public function execute(): false|string {
        $pokemons = $this->pokemonPort->getAllPokemons();
        return $this->pokemonPresenter->presentAll($pokemons);
    }

}