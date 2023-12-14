<?php


class Pokemon {

    private int $id;
    private int $poxedexId;
    private string $name;
    private string $imageUrl;
    private string $spriteUrl;
    private Stat $stat;
    private array $types;
    private string $modifyingTypeAffinitiesAbility;
    private int $generation;
    private array $typeAffinities;
    private PreEvolution|string $preEvolution;
    private array $evolutions;

    public function __construct(int $id, int $poxedexId, string $name, string $imageUrl, string $spriteUrl, Stat $stat, array $types, string $ability, int $generation, array $typeAffinities, PreEvolution|string $preEvolution, array $evolutions) {
        $this->id = $id;
        $this->poxedexId = $poxedexId;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->spriteUrl = $spriteUrl;
        $this->stat = $stat;
        $this->types = $types;
        $this->modifyingTypeAffinitiesAbility = $ability;
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

    public function getTypes(): array {
        return $this->types;
    }

    public function getModifyingTypeAffinitiesAbility(): string {
        return $this->modifyingTypeAffinitiesAbility;
    }

    public function getGeneration(): int {
        return $this->generation;
    }

    public function getTypeAffinities(): array {
        return $this->typeAffinities;
    }

    public function getPreEvolution(): PreEvolution|string {
        return $this->preEvolution;
    }

    public function getEvolutions(): array {
        return $this->evolutions;
    }

}