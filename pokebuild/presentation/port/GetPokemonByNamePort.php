<?php

namespace port;

use domain\beans\Pokemon;

include_once "domain/beans/Pokemon.php";

interface GetPokemonByNamePort {

    public function execute(string $name): false|string;

}