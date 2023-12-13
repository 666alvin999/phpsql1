<?php

class GetPokemonById {

    private PokemonPort $pokemonPort;
    private PokemonPresenter $pokemonPresenter;

    public function __construct(PokemonPort $pokemonPort, PokemonPresenter $pokemonPresenter) {
        $this->pokemonPort = $pokemonPort;
        $this->pokemonPresenter = $pokemonPresenter;
    }

    public function execute(int $id): false|string {
        $pokemon = $this->pokemonPort->getPokemonById($id);
        return $this->pokemonPresenter->present($pokemon);
    }

}