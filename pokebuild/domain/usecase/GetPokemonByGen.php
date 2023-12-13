<?php

class GetPokemonByGen {

    private PokemonPort $pokemonPort;
    private PokemonPresenter $pokemonPresenter;

    public function __construct(PokemonPort $pokemonPort, PokemonPresenter $pokemonPresenter) {
        $this->pokemonPort = $pokemonPort;
        $this->pokemonPresenter = $pokemonPresenter;
    }

    public function execute(int $gen): false|string {
        $pokemons = $this->pokemonPort->getPokemonByGen($gen);
        return $this->pokemonPresenter->presentAll($pokemons);
    }

}