<?php

include_once "domain/beans/Pokemon.php";

interface GetPokemonByIdPort {

    public function execute(int $id): false|string;

}