<?php

namespace infrastructure\adapter;

use domain\beans\Pokemon;
use infrastructure\dao\RegisteredPokemonDataDao;
use infrastructure\fetcher\PokemonDataFetcher;
use infrastructure\mapper\PokemonDataMapper;
use PokemonPort;

include_once "domain/beans/Pokemon.php";
include_once "infrastructure/fetcher/PokemonDataFetcher.php";
include_once "infrastructure/mapper/PokemonDataMapper.php";
include_once "application/port/PokemonPort.php";

class PokemonDataAdapter implements PokemonPort {

    private PokemonDataFetcher $pokemonDataFetcher;
    private RegisteredPokemonDataDao $registeredPokemonDataDao;
    private PokemonDataMapper $pokemonDataMapper;

    public function __construct(PokemonDataFetcher $pokemonDataFetcher, PokemonDataMapper $pokemonDataMapper) {
        $this->pokemonDataFetcher = $pokemonDataFetcher;
        $this->pokemonDataMapper = $pokemonDataMapper;
    }

    public function getPokemonByName(string $name): Pokemon {
        $knownPokemonData = $this->registeredPokemonDataDao->fetchPokemonDataById($id)
        if (!$knownPokemonData) {
            $pokemonData = $this->pokemonDataFetcher->fetchPokemonDataByName($name);
            return $this->pokemonDataMapper->mapToPokemon($pokemonData);
        }
        return $this->pokemonDataMapper->mapToPokemon($knownPokemonData);
    }

    public function getPokemonById(int $id): Pokemon {
        $pokemonData = $this->pokemonDataFetcher->fetchPokemonDataById($id);
        return $this->pokemonDataMapper->mapToPokemon($pokemonData);
    }

    public function getKnownPokemonById(int $id): Pokemon {
        return $this->registeredPokemonDataDao->fetchPokemonDataById($id);
    }

    public function getKnownPokemonByName(string $name): Pokemon {
        return $this->registeredPokemonDataDao->fetchPokemonDataByName($name);
    }
}