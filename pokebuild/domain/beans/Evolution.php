<?php

class Evolution {

    private int $pokedexId;
    private string $name;
    
    public function __construct(int $id, string $name) {
        $this->pokedexId = $id;
        $this->name = $name;
    }

    public function getPokedexId(): int {
        return $this->pokedexId;
    }

    public function getName(): string {
        return $this->name;
    }

}