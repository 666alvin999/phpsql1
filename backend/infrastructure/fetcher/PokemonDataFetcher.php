<?php



include_once "backend/infrastructure/transformer/PokemonDataTransformer.php";

class PokemonDataFetcher {

    public function fetchPokemonDataByName(string $name): PokemonData {
        $jsonData = file_get_contents("https://pokebuildapi.fr/api/v1/pokemon/$name");
        return PokemonDataTransformer::createPokemonDataFromJson(json_decode($jsonData));
    }

    public function fetchPokemonDataById(int $id): PokemonData {
        $jsonData = file_get_contents("https://pokebuildapi.fr/api/v1/pokemon/$id");
        return PokemonDataTransformer::createPokemonDataFromJson(json_decode($jsonData));
    }

}