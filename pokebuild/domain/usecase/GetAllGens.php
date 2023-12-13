<?php

class GetAllGens {

    private PokemonPort $pokemonPort;
    private GenPresenterPort $genPresenter;

    public function __construct(PokemonPort $pokemonPort, GenPresenterPort $genPresenter) {
        $this->pokemonPort = $pokemonPort;
        $this->genPresenter = $genPresenter;
    }

    public function execute(): false|string {
        $gens = $this->pokemonPort->getAllPokemonGens();
        return $this->genPresenter->present($gens);
    }

}