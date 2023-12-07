<?php

namespace port;

include_once "domain/beans/Pokemon.php";

interface GetPokemonByIdPort {

    public function execute(int $id): array;

}