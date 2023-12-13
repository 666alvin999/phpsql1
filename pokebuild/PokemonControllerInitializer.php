<?php

include_once "application/mapper/PokemonMapper.php";
include_once "application/mapper/TypeMapper.php";
include_once "application/mapper/GenMapper.php";
include_once "application/presenter/PokemonPresenter.php";
include_once "application/presenter/TypePresenter.php";
include_once "application/presenter/GenPresenter.php";
include_once "domain/usecase/GetPokemonByName.php";
include_once "domain/usecase/GetPokemonById.php";
include_once "domain/usecase/GetAllPokemons.php";
include_once "domain/usecase/GetAllKnownTypes.php";
include_once "domain/usecase/GetAllGens.php";
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
        $typeMapper = new TypeMapper();
        $pokemonMapper = new PokemonMapper($typeMapper);
        $genMapper = new GenMapper();

        $pokemonDataDao = new RegisteredPokemonDataDao();
        $pokemonStatsDao = new RegisteredPokemonStatsDao();
        $pokemonEvolutionsDao = new RegisteredPokemonEvolutionsDao();
        $pokemonTypeAffinitiesDao = new RegisteredPokemonTypeAffinitiesDao();

        $fetcher = new PokemonDataFetcher();

        $pokemonDataMapper = new PokemonDataMapper();

        $adapter = new PokemonDataAdapter($fetcher, $pokemonDataDao, $pokemonStatsDao, $pokemonEvolutionsDao, $pokemonTypeAffinitiesDao, $pokemonDataMapper);

        $pokemonPresenter = new PokemonPresenter($pokemonMapper);
        $typePresenter = new TypePresenter($typeMapper);
        $genPresenter = new GenPresenter($genMapper);

        $getPokemonByName = new GetPokemonByName($adapter, $pokemonPresenter);
        $getPokemonById = new GetPokemonById($adapter, $pokemonPresenter);
        $getAllPokemons = new GetAllPokemons($adapter, $pokemonPresenter);
        $getAllKnownTypes = new GetAllKnownTypes($adapter, $typePresenter);
        $getPokemonByType = new GetPokemonByType($adapter, $pokemonPresenter);
        $getPokemonByGen = new GetPokemonByGen($adapter, $pokemonPresenter);
        $getAllGens = new GetAllGens($adapter, $genPresenter);

        return new PokemonController($getPokemonByName, $getPokemonByType, $getPokemonByGen, $getPokemonById, $getAllPokemons, $getAllKnownTypes, $getAllGens);
    }

}


