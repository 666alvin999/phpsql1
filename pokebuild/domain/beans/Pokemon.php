<?php

class Pokemon {

    private int $id;
    private int $poxedexId;
    private string $name;
    private string $imageUrl;
    private string $spriteUrl;
    private Stat $stat;
    private ArrayObject $types;
    private string $ability;
    private int $generation;
    private ArrayObject $typeAffinities;
    private PreEvolution | string $preEvolution;
    private ArrayObject $evolutions;

    public function __construct(int $id, int $poxedexId, string $name, string $imageUrl, string $spriteUrl, Stat $stat, ArrayObject $types, string $ability, int $generation, ArrayObject $typeAffinities, PreEvolution | string $preEvolution, ArrayObject $evolutions) {
        $this->id = $id;
        $this->poxedexId = $poxedexId;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->spriteUrl = $spriteUrl;
        $this->stat = $stat;
        $this->types = $types;
        $this->ability = $ability;
        $this->generation = $generation;
        $this->typeAffinities = $typeAffinities;
        $this->preEvolution = $preEvolution;
        $this->evolutions = $evolutions;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getPokedexId(): int {
        return $this->poxedexId;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getImageUrl(): string {
        return $this->imageUrl;
    }

    public function getSpriteUrl(): string {
        return $this->spriteUrl;
    }

    public function getStat(): Stat {
        return $this->stat;
    }

    public function getTypes(): ArrayObject {
        return $this->types;
    }

    public function getAbility(): string {
        return $this->ability;
    }

    public function getGeneration(): int {
        return $this->generation;
    }

    public function getTypeAffinities(): ArrayObject {
        return $this->typeAffinities;
    }

    public function getPreEvolution(): PreEvolution|string {
        return $this->preEvolution;
    }

    public function getEvolutions(): ArrayObject {
        return $this->evolutions;
    }

}