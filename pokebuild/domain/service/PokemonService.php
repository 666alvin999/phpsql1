<?php

class PokemonService {

    public function convertPokemonToArray(Pokemon $pokemon) {
        $preEvolution = "none";

        if (gettype($pokemon->getPreEvolution()) != "string") {
            $preEvolution = array(
                'name' => $pokemon->getPreEvolution()->getName(),
                'pokedexId' => $pokemon->getPreEvolution()->getPokedexId()
            );
        }

        return array(
            'id' => $pokemon->getId(),
            'pokedexId' => $pokemon->getPokedexId(),
            'name' => $pokemon->getName(),
            'imageUrl' => $pokemon->getImageUrl(),
            'spriteUrl' => $pokemon->getSpriteUrl(),
            'stat' => array(
                'HP' => $pokemon->getStat()->getHp(),
                'Attack' => $pokemon->getStat()->getAttack(),
                'Defense' => $pokemon->getStat()->getDefense(),
                'Spe. Attack' => $pokemon->getStat()->getSpeAttack(),
                'Spe. Defense' => $pokemon->getStat()->getSpeDef(),
                'Speed' => $pokemon->getStat()->getSpeed()
            ),
            'types' => $pokemon->getTypes(),
            'ability' => $pokemon->getAbility(),
            'generation' => $pokemon->getGeneration(),
            'typeAffinities' => $pokemon->getTypeAffinities(),
            'preEvolution' => $preEvolution,
            'evolutions' => $pokemon->getEvolutions()
        );
    }

}