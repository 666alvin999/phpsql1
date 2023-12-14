<?php



include_once "backend/domain/beans/Pokemon.php";
include_once "backend/domain/beans/Type.php";
include_once "backend/infrastructure/dto/PokemonData.php";

class PokemonDataMapper {

    public function mapToPokemonFromFetcher(PokemonData $pokemonData): Pokemon {
        $resistanceModifyingAbilitiesForApi = gettype($pokemonData->getResistanceModifyingAbilitiesForApi()) != "array" ? $pokemonData->getResistanceModifyingAbilitiesForApi()->getName() : "none";

        $types = [];

        foreach ($pokemonData->getApiTypes() as $apiType) {
            $types[] = new Type($apiType->name, $apiType->image);
        }

        return new Pokemon(
            $pokemonData->getId(),
            $pokemonData->getPokedexId(),
            $pokemonData->getName(),
            $pokemonData->getImage(),
            $pokemonData->getSprite(),
            $pokemonData->getStats(),
            $types,
            $resistanceModifyingAbilitiesForApi,
            $pokemonData->getApiGeneration(),
            $pokemonData->getApiResistancesWithAbilities(),
            $pokemonData->getApiPreEvolution(),
            $pokemonData->getApiEvolutions()
        );
    }

    public function mapToPokemonFromDaos(object $pokemonData, Stat $pokemonStat, array $pokemonEvolutions, array $pokemonTypeAffinities): Pokemon {
        $resistanceModifyingAbilitiesForApi = $pokemonData->ABILITY != "NULL" ? $pokemonData->ABILITY : "none";

        $preEvolution = "none";

        if ($pokemonData->PRE_EVOLUTION != null) {
            $explodedPreEvolution = explode(";", $pokemonData->PRE_EVOLUTION);
            $preEvolution = new PreEvolution($explodedPreEvolution[1], $explodedPreEvolution[0]);
        }

        $types = [];

        $explodedType = explode(';', $pokemonData->TYPES);

        for ($i = 0; $i < count($explodedType); $i += 2) {
            $types[] = new Type($explodedType[$i], $explodedType[$i + 1]);
        }

        return new Pokemon(
            $pokemonData->ID,
            $pokemonData->POKEDEX_ID,
            $pokemonData->NAME,
            $pokemonData->IMAGE_URL,
            $pokemonData->SPRITE_URL,
            $pokemonStat,
            $types,
            $resistanceModifyingAbilitiesForApi,
            $pokemonData->GENERATION,
            $pokemonTypeAffinities,
            $preEvolution,
            $pokemonEvolutions
        );
    }

}