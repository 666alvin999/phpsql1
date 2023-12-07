<?php

namespace infrastructure\dto;

use ArrayObject;
use domain\beans\PreEvolution;
use domain\beans\Stat;

include_once "domain/beans/Stat.php";

class PokemonData {

    private int $id;
    private int $pokedexId;
    private string $name;
    private string $image;
    private string $sprite;
    private string $slug;
    private Stat $stats;
    private ArrayObject $apiTypes;
    private int $apiGeneration;
    private ArrayObject $apiResistances;
    private ResistanceModifyingAbilitiesForApi|ArrayObject $resistanceModifyingAbilitiesForApi;
    private ArrayObject $apiEvolutions;
    private PreEvolution|string $apiPreEvolution;
    private ArrayObject $apiResistancesWithAbilities;

    public function __construct(int $id, int $pokedexId, string $name, string $image, string $sprite, string $slug, Stat $stats, ArrayObject $apiTypes, int $apiGeneration, ArrayObject $apiResistances, ResistanceModifyingAbilitiesForApi|ArrayObject $resistanceModifyingAbilitiesForApi, ArrayObject $apiEvolutions, PreEvolution|string $apiPreEvolution, ArrayObject $apiResistancesWithAbilities) {
        $this->id = $id;
        $this->pokedexId = $pokedexId;
        $this->name = $name;
        $this->image = $image;
        $this->sprite = $sprite;
        $this->slug = $slug;
        $this->stats = $stats;
        $this->apiTypes = $apiTypes;
        $this->apiGeneration = $apiGeneration;
        $this->apiResistances = $apiResistances;
        $this->resistanceModifyingAbilitiesForApi = $resistanceModifyingAbilitiesForApi;
        $this->apiEvolutions = $apiEvolutions;
        $this->apiPreEvolution = $apiPreEvolution;
        $this->apiResistancesWithAbilities = $apiResistancesWithAbilities;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getSprite(): string {
        return $this->sprite;
    }

    public function getStats(): Stat {
        return $this->stats;
    }

    public function getApiTypes(): ArrayObject {
        return $this->apiTypes;
    }

    public function getApiGeneration(): int {
        return $this->apiGeneration;
    }

    public function getApiResistances(): ArrayObject {
        return $this->apiResistances;
    }

    public function getResistanceModifyingAbilitiesForApi(): ResistanceModifyingAbilitiesForApi|ArrayObject {
        return $this->resistanceModifyingAbilitiesForApi;
    }

    public function getApiEvolutions(): ArrayObject {
        return $this->apiEvolutions;
    }

    public function getApiPreEvolution(): PreEvolution|string {
        return $this->apiPreEvolution;
    }

    public function getApiResistancesWithAbilities(): ArrayObject {
        return $this->apiResistancesWithAbilities;
    }

}