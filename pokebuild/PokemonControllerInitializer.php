<?php

use application\usecase\getPokemonByName;
use infrastructure\adapter\PokemonDataAdapter;
use infrastructure\fetcher\PokemonDataFetcher;
use infrastructure\mapper\PokemonDataMapper;
use presentation\controller\PokemonController;

include_once("application/usecase/GetPokemonByName.php");
include_once("infrastructure/adapter/PokemonDataAdapter.php");
include_once("infrastructure/fetcher/PokemonDataFetcher.php");
include_once("infrastructure/mapper/PokemonDataMapper.php");
include_once("presentation/controller/PokemonController.php");

class PokemonControllerInitializer {

    public static function initController(): PokemonController {
        $fetcher = new PokemonDataFetcher();
        $mapper = new PokemonDataMapper();
        $adapter = new PokemonDataAdapter($fetcher, $mapper);
        $presenter = new PokemonPresenter();
        $usecase = new GetPokemonByName($adapter, $presenter);
        return new PokemonController($usecase);
    }

}


