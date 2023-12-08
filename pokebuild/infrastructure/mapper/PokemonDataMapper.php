<?php

include_once "domain/beans/Pokemon.php";
include_once "infrastructure/dto/PokemonData.php";

class PokemonDataMapper {

    public function mapToPokemonFromFetcher(PokemonData $pokemonData): Pokemon {
        $resistanceModifyingAbilitiesForApi = get_class($pokemonData->getResistanceModifyingAbilitiesForApi()) != "ArrayObject" ? $pokemonData->getResistanceModifyingAbilitiesForApi()->getName() : "none";

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

    public function mapToPokemonFromDaos(Object $pokemonData, Object $pokemonStat, Object $pokemonEvolutions, Object $pokemonTypeAffinities): Pokemon {
        $resistanceModifyingAbilitiesForApi = $pokemonData['ABILITY'] != "NULL" ? $pokemonData['ABILITY'] : "none";
        $preEvolution = $pokemonData['PRE_EVOLUTION'] != "NULL" ? $pokemonData['PRE_EVOLUTION'] : "none";

        return new Pokemon(
            $pokemonData['ID'],
            $pokemonData['POKEDEX_ID'],
            $pokemonData['NAME'],
            $pokemonData['IMAGE_URL'],
            $pokemonData['SPRITE_URL'],
            new Stat(
                $pokemonStat['HP'],
                $pokemonStat['ATTACK'],
                $pokemonStat['DEFENSE'],
                $pokemonStat['SPE_ATTACK'],
                $pokemonStat['SPE_DEFENSE'],
                $pokemonStat['SPEED']
            ),
            new ArrayObject(explode(";", $pokemonData['TYPES'])),
            $resistanceModifyingAbilitiesForApi,
            $pokemonData['GENERATION'],
            new ArrayObject($pokemonTypeAffinities),
            $preEvolution,
            new ArrayObject($pokemonEvolutions)
        );
    }

}