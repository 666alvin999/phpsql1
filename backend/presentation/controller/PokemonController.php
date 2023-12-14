<?php



include_once "backend/domain/usecase/GetPokemonById.php";
include_once "backend/domain/usecase/GetPokemonByName.php";
include_once "backend/domain/usecase/GetPokemonByType.php";
include_once "backend/domain/usecase/GetPokemonByGen.php";
include_once "backend/domain/usecase/GetAllPokemons.php";
include_once "backend/domain/usecase/GetAllKnownTypes.php";
include_once "backend/domain/usecase/GetAllGens.php";

class PokemonController {

    private GetPokemonByName $getPokemonByName;
    private GetPokemonByType $getPokemonByType;
    private GetPokemonByGen $getPokemonByGen;
    private GetPokemonById $getPokemonById;
    private GetAllPokemons $getAllPokemons;
    private GetAllKnownTypes $getAllKnownTypes;
    private GetAllGens $getAllGens;

    public function __construct(GetPokemonByName $getPokemonByName, GetPokemonByType $getPokemonByType, GetPokemonByGen $getPokemonByGen, GetPokemonById $getPokemonById, GetAllPokemons $getAllPokemons, GetAllKnownTypes $getAllKnownTypes, GetAllGens $getAllGens) {
        $this->getPokemonByName = $getPokemonByName;
        $this->getPokemonByType = $getPokemonByType;
        $this->getPokemonByGen = $getPokemonByGen;
        $this->getPokemonById = $getPokemonById;
        $this->getAllPokemons = $getAllPokemons;
        $this->getAllKnownTypes = $getAllKnownTypes;
        $this->getAllGens = $getAllGens;
    }


    public function getPokemonByName(string $name): false|string {
        return $this->getPokemonByName->execute($name);
    }

    public function getAllPokemons(): false|string {
        return $this->getAllPokemons->execute();
    }

    public function getPokemonById(int $id): false|string {
        return $this->getPokemonById->execute($id);
    }

    public function getPokemonByType(string $type): false|string {
        return $this->getPokemonByType->execute($type);
    }

    public function getPokemonByGen(int $gen): false|string {
        return $this->getPokemonByGen->execute($gen);
    }

    public function getPokemonAllKnownTypes(): false|string {
        return $this->getAllKnownTypes->execute();
    }

    public function getPokemonAllGens(): false|string {
        return $this->getAllGens->execute();
    }

}