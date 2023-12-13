<?php

interface PokemonPresenterPort {

    public function present(Pokemon $pokemon): false|string;

    public function presentAll(array $pokemons): false|string;

}