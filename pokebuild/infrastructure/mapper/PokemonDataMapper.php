<?php

namespace infrastructure\mapper;

use domain\beans\Pokemon;
use infrastructure\dto\PokemonData;

include_once "domain/beans/Pokemon.php";
include_once "infrastructure/dto/PokemonData.php";

class PokemonDataMapper {

    public function mapToPokemon(PokemonData $pokemonData): Pokemon {
        $resistanceModifyingAbilitiesForApi = get_class($pokemonData->getResistanceModifyingAbilitiesForApi()) != "ArrayObject" ? $pokemonData->getResistanceModifyingAbilitiesForApi()->getName() : "none";

        return new Pokemon(
            $pokemonData->getId(),
            $pokemonData->getName(),
            $pokemonData->getImage(),
            $pokemonData->getSprite(),
            $pokemonData->getStats(),
            $pokemonData->getApiTypes(),
            $resistanceModifyingAbilitiesForApi,
            $pokemonData->getApiGeneration(),
            $pokemonData->getApiResistances(),
            $pokemonData->getApiResistancesWithAbilities(),
            $pokemonData->getApiPreEvolution(),
            $pokemonData->getApiEvolutions()
        );
    }

}