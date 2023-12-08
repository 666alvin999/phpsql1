<?php

include_once "domain/service/PokemonService.php";
include_once "application/usecase/GetPokemonByName.php";
include_once "application/usecase/GetPokemonById.php";
include_once "infrastructure/adapter/PokemonDataAdapter.php";
include_once "infrastructure/fetcher/PokemonDataFetcher.php";
include_once "infrastructure/dao/RegisteredPokemonDataDao.php";
include_once "infrastructure/mapper/PokemonDataMapper.php";
include_once "presentation/controller/PokemonController.php";

class PokemonControllerInitializer {

    public static function initController(): PokemonController {
        $pokemonService = new PokemonService();
        $dao = new RegisteredPokemonDataDao();
        $fetcher = new PokemonDataFetcher();
        $mapper = new PokemonDataMapper();
        $adapter = new PokemonDataAdapter($fetcher, $dao, $mapper);
        $presenter = new PokemonPresenter($pokemonService);
        $getPokemonByName = new GetPokemonByName($adapter, $presenter);
        $getPokemonById = new GetPokemonById($adapter, $presenter);
        return new PokemonController($getPokemonByName, $getPokemonById);
    }

}


