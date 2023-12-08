<?php

class PreEvolution {

    private string $name;
    private int $pokedexId;

    public function __construct(string $name, int $pokedexId) {
        $this->name = $name;
        $this->pokedexId = $pokedexId;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPokedexId(): int {
        return $this->pokedexId;
    }

}