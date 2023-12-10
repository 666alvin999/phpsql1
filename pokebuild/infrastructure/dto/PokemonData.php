<?php

include_once "domain/beans/Stat.php";

class PokemonData {

    private int $id;
    private int $pokedexId;
    private string $name;
    private string $image;
    private string $sprite;
    private Stat $stats;
    private array $apiTypes;
    private int $apiGeneration;
    private ResistanceModifyingAbilitiesForApi|array $resistanceModifyingAbilitiesForApi;
    private array $apiEvolutions;
    private PreEvolution|string $apiPreEvolution;
    private array $apiResistancesWithAbilities;

    public function __construct(int $id, int $pokedexId, string $name, string $image, string $sprite, Stat $stats, array $apiTypes, int $apiGeneration, ResistanceModifyingAbilitiesForApi|array $resistanceModifyingAbilitiesForApi, array $apiEvolutions, PreEvolution|string $apiPreEvolution, array $apiResistancesWithAbilities) {
        $this->id = $id;
        $this->pokedexId = $pokedexId;
        $this->name = $name;
        $this->image = $image;
        $this->sprite = $sprite;
        $this->stats = $stats;
        $this->apiTypes = $apiTypes;
        $this->apiGeneration = $apiGeneration;
        $this->resistanceModifyingAbilitiesForApi = $resistanceModifyingAbilitiesForApi;
        $this->apiEvolutions = $apiEvolutions;
        $this->apiPreEvolution = $apiPreEvolution;
        $this->apiResistancesWithAbilities = $apiResistancesWithAbilities;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getPokedexId(): int {
        return $this->pokedexId;
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

    public function getApiTypes(): array {
        return $this->apiTypes;
    }

    public function getApiGeneration(): int {
        return $this->apiGeneration;
    }

    public function getResistanceModifyingAbilitiesForApi(): ResistanceModifyingAbilitiesForApi|array {
        return $this->resistanceModifyingAbilitiesForApi;
    }

    public function getApiEvolutions(): array {
        return $this->apiEvolutions;
    }

    public function getApiPreEvolution(): PreEvolution|string {
        return $this->apiPreEvolution;
    }

    public function getApiResistancesWithAbilities(): array {
        return $this->apiResistancesWithAbilities;
    }

}