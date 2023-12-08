<?php

include_once "infrastructure/dto/ResistanceModifyingAbilitiesForApi.php";
include_once "domain/beans/PreEvolution.php";
include_once "domain/beans/Stat.php";

class PokemonDataTransformer {

    public static function createPokemonDataFromJson($jsonData): PokemonData {
        $resistanceModifyingAbilitiesForApi = new ArrayObject();

        if ($jsonData->resistanceModifyingAbilitiesForApi->name) {
            $resistanceModifyingAbilitiesForApi = new ResistanceModifyingAbilitiesForApi(
                $jsonData->resistanceModifyingAbilitiesForApi->name,
                $jsonData->resistanceModifyingAbilitiesForApi->slug,
            );
        }

        $apiPreEvolution = "none";

        if (gettype($jsonData->apiPreEvolution) != "string") {
            $apiPreEvolution = new PreEvolution($jsonData->apiPreEvolution->name, $jsonData->apiPreEvolution->pokedexIdd);
        }

        return new PokemonData(
            $jsonData->id,
            $jsonData->pokedexId,
            $jsonData->name,
            $jsonData->image,
            $jsonData->sprite,
            $jsonData->slug,
            new Stat(
                $jsonData->stats->HP,
                $jsonData->stats->attack,
                $jsonData->stats->defense,
                $jsonData->stats->special_attack,
                $jsonData->stats->special_defense,
                $jsonData->stats->speed,
            ),
            new ArrayObject($jsonData->apiTypes),
            $jsonData->apiGeneration,
            new ArrayObject($jsonData->apiResistances),
            $resistanceModifyingAbilitiesForApi,
            new ArrayObject($jsonData->apiEvolutions),
            $apiPreEvolution,
            new ArrayObject($jsonData->apiResistancesWithAbilities)
        );
    }

}