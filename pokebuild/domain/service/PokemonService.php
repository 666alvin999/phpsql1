<?php

class PokemonService {

    public function convertPokemonToArray(Pokemon $pokemon) {
        $preEvolution = $this->createPokemonPreEvolutionArray($pokemon);

        $stat = $this->createPokemonStatArray($pokemon->getStat());
        $evolutions = $this->createPokemonEvolutionsArray($pokemon->getEvolutions());
        $typeAffinities = $this->createPokemonTypeAffinitiesArray($pokemon->getTypeAffinities());

        $types = $this->createPokemonTypesArray($pokemon);

        return array(
            'id' => $pokemon->getId(),
            'pokedexId' => $pokemon->getPokedexId(),
            'name' => $pokemon->getName(),
            'imageUrl' => $pokemon->getImageUrl(),
            'spriteUrl' => $pokemon->getSpriteUrl(),
            'stat' => $stat,
            'types' => $types,
            'ability' => $pokemon->getModifyingTypeAffinitiesAbility(),
            'generation' => $pokemon->getGeneration(),
            'typeAffinities' => $typeAffinities,
            'preEvolution' => $preEvolution,
            'evolutions' => $evolutions
        );
    }

    private function createPokemonStatArray(Stat $stat): array {
        return array(
            'HP' => $stat->getHp(),
            'Attack' => $stat->getAttack(),
            'Defense' => $stat->getDefense(),
            'Spe. Attack' => $stat->getSpeAttack(),
            'Spe. Defense' => $stat->getSpeDef(),
            'Speed' => $stat->getSpeed()
        );
    }

    private function createPokemonEvolutionsArray(array $evolutionsArray): array {
        $evolutions = [];

        foreach ($evolutionsArray as $evolution) {
            $evolutions[] = array(
                'name' => $evolution->getName(),
                'pokedexId' => $evolution->getPokedexId()
            );
        }

        return $evolutions;
    }

    private function createPokemonTypeAffinitiesArray(array $typeAffinitiesArray): array {
        $typeAffinities = [];

        foreach ($typeAffinitiesArray as $typeAffinity) {
            $typeAffinities[] = array(
                'typeName' => $typeAffinity->getTypeName(),
                'damageMultiplier' => $typeAffinity->getDamageMultiplier(),
            );
        }

        return $typeAffinities;
    }

    private function createPokemonPreEvolutionArray(Pokemon $pokemon): array|string {
        $preEvolution = "none";
        
        if (gettype($pokemon->getPreEvolution()) != "string") {
            $preEvolution = array(
                'name' => $pokemon->getPreEvolution()->getName(),
                'pokedexId' => $pokemon->getPreEvolution()->getPokedexId()
            );
        }
        
        return $preEvolution;
    }

    private function createPokemonTypesArray(Pokemon $pokemon): array {
        $types = [];

        foreach ($pokemon->getTypes() as $type) {
            $types[] = array(
                'typeName' => $type->getTypeName(),
                'imageUrl' => $type->getImageUrl()
            );
        }

        return $types;
    }

}