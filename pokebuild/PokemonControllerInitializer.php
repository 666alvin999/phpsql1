<?php

include_once "domain/service/PokemonService.php";
include_once "application/usecase/GetPokemonByName.php";
include_once "application/usecase/GetPokemonById.php";
include_once "infrastructure/adapter/PokemonDataAdapter.php";
include_once "infrastructure/fetcher/PokemonDataFetcher.php";
include_once "infrastructure/dao/RegisteredPokemonDataDao.php";
include_once "infrastructure/dao/RegisteredPokemonStatsDao.php";
include_once "infrastructure/dao/RegisteredPokemonEvolutionsDao.php";
include_once "infrastructure/dao/RegisteredPokemonTypeAffinitiesDao.php";
include_once "infrastructure/mapper/PokemonDataMapper.php";
include_once "presentation/controller/PokemonController.php";

class PokemonControllerInitializer {

    public static function initController(): PokemonController {
        $pokemonService = new PokemonService();
        $pokemonDataDao = new RegisteredPokemonDataDao();
        $pokemonStatsDao = new RegisteredPokemonStatsDao();
        $pokemonEvolutionsDao = new RegisteredPokemonEvolutionsDao();
        $pokemonTypeAffinitiesDao = new RegisteredPokemonTypeAffinitiesDao();
        $fetcher = new PokemonDataFetcher();
        $mapper = new PokemonDataMapper();
        $adapter = new PokemonDataAdapter($fetcher, $pokemonDataDao, $pokemonStatsDao, $pokemonEvolutionsDao, $pokemonTypeAffinitiesDao, $mapper);
        $presenter = new PokemonPresenter($pokemonService);
        $getPokemonByName = new GetPokemonByName($adapter, $presenter);
        $getPokemonById = new GetPokemonById($adapter, $presenter);
        return new PokemonController($getPokemonByName, $getPokemonById);
    }

}


