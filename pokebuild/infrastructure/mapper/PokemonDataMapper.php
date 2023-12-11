<?php

include_once "domain/beans/Pokemon.php";
include_once "domain/beans/Type.php";
include_once "infrastructure/dto/PokemonData.php";

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

    public function mapToPokemonFromDaos(Object $pokemonData, Stat $pokemonStat, array $pokemonEvolutions, array $pokemonTypeAffinities): Pokemon {
        $resistanceModifyingAbilitiesForApi = $pokemonData->ABILITY != "NULL" ? $pokemonData->ABILITY : "none";
        $preEvolution = $pokemonData->PRE_EVOLUTION != null ? $pokemonData->PRE_EVOLUTION : "none";

        $types = [];

        $explodedType = explode(';', $pokemonData->TYPES);

        for ($i = 0; $i < count($explodedType); $i += 2) {
            $types[] = new Type($explodedType[$i], $explodedType[$i+1]);
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