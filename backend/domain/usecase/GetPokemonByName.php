<?php



class getPokemonByName {

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