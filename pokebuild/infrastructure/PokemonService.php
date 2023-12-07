<?php

namespace infrastructure;

use domain\beans\Pokemon;

class PokemonService {

    public function convertPokemonToArray(Pokemon $pokemon) {
        $preEvolution = "none";

        if (get_class($pokemon) == "PreEvolution") {
            $preEvolution = array(
                'name' => $pokemon->getPreEvolution()->getName(),
                'pokedexId' => $pokemon->getPreEvolution()->getPokedexId()
            );
        }

        return array(
            'id' => $pokemon->getId(),
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
            'types' => $pokemon->getTypes()->getArrayCopy(),
            'ability' => $pokemon->getAbility(),
            'generation' => $pokemon->getGeneration(),
            'resistances' => $pokemon->getResistances()->getArrayCopy(),
            'vulnerabilities' => $pokemon->getVulnerabilities()->getArrayCopy(),
            'preEvolution' => $preEvolution,
            'evolutions' => $pokemon->getEvolutions()->getArrayCopy()
        );
    }

}