<?php

include_once "domain/beans/Pokemon.php";

interface PokemonPort {

    public function getPokemonByName(string $name): ?Pokemon;

    public function getPokemonById(int $id): ?Pokemon;

    public function getPokemonByType(string $type): array;

    public function getAllPokemons(): array;

    public function getAllPokemonTypes(): array;

    public function getAllPokemonGens(): array;

    public function getPokemonByGen(int $gen): array;

}