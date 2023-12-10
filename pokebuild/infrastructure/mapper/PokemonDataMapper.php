<?php

include_once "domain/beans/Pokemon.php";
include_once "infrastructure/dto/PokemonData.php";

class PokemonDataMapper {

    public function mapToPokemonFromFetcher(PokemonData $pokemonData): Pokemon {
        $resistanceModifyingAbilitiesForApi = gettype($pokemonData->getResistanceModifyingAbilitiesForApi()) != "array" ? $pokemonData->getResistanceModifyingAbilitiesForApi()->getName() : "none";

        return new Pokemon(
            $pokemonData->getId(),
            $pokemonData->getPokedexId(),
            $pokemonData->getName(),
            $pokemonData->getImage(),
            $pokemonData->getSprite(),
            $pokemonData->getStats(),
            $pokemonData->getApiTypes(),
            $resistanceModifyingAbilitiesForApi,
            $pokemonData->getApiGeneration(),
            $pokemonData->getApiResistancesWithAbilities(),
            $pokemonData->getApiPreEvolution(),
            $pokemonData->getApiEvolutions()
        );
    }

    public function mapToPokemonFromDaos(Object $pokemonData, Stat $pokemonStat, array $pokemonEvolutions, array $pokemonTypeAffinities): Pokemon {
        $resistanceModifyingAbilitiesForApi = $pokemonData['ABILITY'] != "NULL" ? $pokemonData['ABILITY'] : "none";
        $preEvolution = $pokemonData['PRE_EVOLUTION'] != "NULL" ? $pokemonData['PRE_EVOLUTION'] : "none";

        return new Pokemon(
            $pokemonData['ID'],
            $pokemonData['POKEDEX_ID'],
            $pokemonData['NAME'],
            $pokemonData['IMAGE_URL'],
            $pokemonData['SPRITE_URL'],
            $pokemonStat,
            explode(";", $pokemonData['TYPES']),
            $resistanceModifyingAbilitiesForApi,
            $pokemonData['GENERATION'],
            $pokemonTypeAffinities,
            $preEvolution,
            $pokemonEvolutions
        );
    }

}