<?php



include_once "backend/infrastructure/dto/ResistanceModifyingAbilitiesForApi.php";
include_once "backend/domain/beans/PreEvolution.php";
include_once "backend/domain/beans/Evolution.php";
include_once "backend/domain/beans/TypeAffinity.php";
include_once "backend/domain/beans/Stat.php";

class PokemonDataTransformer {

    public static function createPokemonDataFromJson($jsonData): PokemonData {
        $resistanceModifyingAbilitiesForApi = [];

        if (gettype($jsonData->resistanceModifyingAbilitiesForApi) != "array") {
            $resistanceModifyingAbilitiesForApi = new ResistanceModifyingAbilitiesForApi(
                $jsonData->resistanceModifyingAbilitiesForApi->name,
                $jsonData->resistanceModifyingAbilitiesForApi->slug,
            );
        }

        $apiPreEvolution = "none";

        if (gettype($jsonData->apiPreEvolution) != "string") {
            $apiPreEvolution = new PreEvolution($jsonData->apiPreEvolution->name, $jsonData->apiPreEvolution->pokedexIdd);
        }

        $stats = self::createPokemonStatFromObject($jsonData->stats);
        $evolutions = self::createPokemonEvolutionsFromArray($jsonData->apiEvolutions);
        $typeAffinities = count($jsonData->apiResistancesWithAbilities) != 0 ? self::createPokemonTypeAffinitiesFromArray($jsonData->apiResistancesWithAbilities) : self::createPokemonTypeAffinitiesFromArray($jsonData->apiResistances);

        return new PokemonData(
            $jsonData->id,
            $jsonData->pokedexId,
            $jsonData->name,
            $jsonData->image,
            $jsonData->sprite,
            $stats,
            $jsonData->apiTypes,
            $jsonData->apiGeneration,
            $resistanceModifyingAbilitiesForApi,
            $evolutions,
            $apiPreEvolution,
            $typeAffinities
        );
    }

    public static function createPokemonStatFromObject(object $object): Stat {
        return new Stat(
            $object->HP,
            property_exists($object, 'ATTACK') ? $object->ATTACK : $object->attack,
            property_exists($object, 'DEFENSE') ? $object->DEFENSE : $object->defense,
            property_exists($object, 'SPE_ATTACK') ? $object->SPE_ATTACK : $object->special_attack,
            property_exists($object, 'SPE_DEFENSE') ? $object->SPE_DEFENSE : $object->special_defense,
            property_exists($object, 'SPEED') ? $object->SPEED : $object->speed
        );
    }

    public static function createPokemonEvolutionsFromArray(array $evolutionsArray): array {
        $evolutions = [];

        foreach ($evolutionsArray as $evolution) {
            $evolutions[] = new Evolution(
                property_exists($evolution, 'POKEDEX_ID') ? $evolution->POKEDEX_ID : $evolution->pokedexId,
                property_exists($evolution, 'NAME') ? $evolution->NAME : $evolution->name
            );
        }

        return $evolutions;
    }

    public static function createPokemonTypeAffinitiesFromArray(array $typeAffinitiesArray): array {
        $typeAffinities = [];

        foreach ($typeAffinitiesArray as $typeAffinity) {
            $typeAffinities[] = new TypeAffinity(
                property_exists($typeAffinity, 'TYPE_NAME') ? $typeAffinity->TYPE_NAME : $typeAffinity->name,
                property_exists($typeAffinity, 'DAMAGE_MULTIPLIER') ? $typeAffinity->DAMAGE_MULTIPLIER : $typeAffinity->damage_multiplier
            );
        }

        return $typeAffinities;
    }

    public static function createTypesArrayFromDaoTypes(array $daoTypes): array {
        $types = [];

        foreach ($daoTypes as $daoType) {
            $explodedType = explode(";", $daoType->TYPES);

            for ($i = 0; $i < count($explodedType); $i += 2) {
                if (!array_key_exists($explodedType[$i], $types)) {
                    $types[$explodedType[$i]] = new Type($explodedType[$i], $explodedType[$i + 1]);
                }
            }
        }

        return $types;
    }

    public static function createGenArrayFromDaoGens(array $daoGens): array {
        $gens = [];

        foreach ($daoGens as $daoGen) {
            if (!in_array($daoGen->GENERATION, $gens))
                $gens[] = $daoGen->GENERATION;
        }

        return $gens;
    }

}