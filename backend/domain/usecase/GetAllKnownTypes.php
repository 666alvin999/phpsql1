<?php



class GetAllKnownTypes {

    private PokemonPort $pokemonPort;
    private TypePresenterPort $typePresenter;

    public function __construct(PokemonPort $pokemonPort, TypePresenterPort $typePresenter) {
        $this->pokemonPort = $pokemonPort;
        $this->typePresenter = $typePresenter;
    }

    public function execute(): false|string {
        $types = $this->pokemonPort->getAllPokemonTypes();
        return $this->typePresenter->present($types);
    }

}