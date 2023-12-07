<?php

namespace domain\beans;

use ArrayObject;

class Pokemon {

    private int $id;
    private string $name;
    private string $imageUrl;
    private string $spriteUrl;
    private Stat $stat;
    private ArrayObject $types;
    private string $ability;
    private int $generation;
    private ArrayObject $resistances;
    private ArrayObject $vulnerabilities;
    private PreEvolution | string $preEvolution;
    private ArrayObject $evolutions;

    public function __construct(int $id, string $name, string $imageUrl, string $spriteUrl, Stat $stat, ArrayObject $types, string $ability, int $generation, ArrayObject $resistances, ArrayObject $vulnerabilities, PreEvolution | string $preEvolution, ArrayObject $evolutions) {
        $this->id = $id;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->spriteUrl = $spriteUrl;
        $this->stat = $stat;
        $this->types = $types;
        $this->ability = $ability;
        $this->generation = $generation;
        $this->resistances = $resistances;
        $this->vulnerabilities = $vulnerabilities;
        $this->preEvolution = $preEvolution;
        $this->evolutions = $evolutions;
    }

    public function getId(): int {
        return $this->id;
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

    public function getResistances(): ArrayObject {
        return $this->resistances;
    }

    public function getVulnerabilities(): ArrayObject {
        return $this->vulnerabilities;
    }

    public function getPreEvolution(): string {
        return $this->preEvolution;
    }

    public function getEvolutions(): ArrayObject {
        return $this->evolutions;
    }

}