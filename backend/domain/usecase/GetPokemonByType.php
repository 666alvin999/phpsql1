<?php



class GetPokemonByType {

    private PokemonPort $pokemonPort;
    private PokemonPresenter $pokemonPresenter;

    public function __construct(PokemonPort $pokemonPort, PokemonPresenter $pokemonPresenter) {
        $this->pokemonPort = $pokemonPort;
        $this->pokemonPresenter = $pokemonPresenter;
    }

    public function execute(string $type): false|string {
        $pokemons = $this->pokemonPort->getPokemonByType($type);
        return $this->pokemonPresenter->presentAll($pokemons);
    }

}