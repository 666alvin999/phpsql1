<?php

include_once "domain/beans/Pokemon.php";
include_once "infrastructure/fetcher/PokemonDataFetcher.php";
include_once "infrastructure/mapper/PokemonDataMapper.php";
include_once "application/port/PokemonPort.php";

class PokemonDataAdapter implements PokemonPort {

    private PokemonDataFetcher $pokemonDataFetcher;
    private RegisteredPokemonDataDao $registeredPokemonDataDao;
    private PokemonDataMapper $pokemonDataMapper;

    public function __construct(PokemonDataFetcher $pokemonDataFetcher, RegisteredPokemonDataDao $registeredPokemonDataDao, PokemonDataMapper $pokemonDataMapper) {
        $this->pokemonDataFetcher = $pokemonDataFetcher;
        $this->registeredPokemonDataDao = $registeredPokemonDataDao;
        $this->pokemonDataMapper = $pokemonDataMapper;
    }

    public function getPokemonByName(string $name): ?Pokemon {
        $knownPokemonData = $this->registeredPokemonDataDao->getPokemonDataByName($name);

        if (!$knownPokemonData) {
            $pokemonData = $this->pokemonDataFetcher->fetchPokemonDataByName($name);

            if ($pokemonData) {
                $pokemon = $this->pokemonDataMapper->mapToPokemonFromFetcher($pokemonData);
                $this->registeredPokemonDataDao->insertPokemonData($pokemon);
//                $this->registeredPokemonStatDao->insertPokemonStat($pokemon->getStat());
//                $this->registeredPokemonEvolutionsDao->insertPokemonEvolutions($pokemon->getEvolutions());
//                $this->registeredPokemonTypeAffinities->insertPokemonAffinities($pokemon->getResistances(), $pokemon->getVulnerabilities());

                return $pokemon;
            }

            return null;
        }
//
//        $knownPokemonData = $this->registeredPokemonStatDao->getPokemonStatByName($name);
//        $knownPokemonData = $this->registeredPokemonEvolutionsDao->getPokemonEvolutionsByName($name);
//        $knownPokemonData = $this->registeredPokemonTypeAffinities->getPokemonTypeAffinitiesByName($name);

        return $this->pokemonDataMapper->mapToPokemonFromDaos($knownPokemonData);
    }

    public function getPokemonById(int $id): ?Pokemon {
        $knownPokemonData = $this->registeredPokemonDataDao->getPokemonDataByName($id);

        if (!$knownPokemonData) {
            $pokemonData = $this->pokemonDataFetcher->fetchPokemonDataByName($id);

            if ($pokemonData) {
                $pokemon = $this->pokemonDataMapper->mapToPokemonFromFetcher($pokemonData);
                $this->registeredPokemonDataDao->insertPokemonData($pokemon);
//                $this->registeredPokemonStatDao->insertPokemonStat($pokemon->getStat());
//                $this->registeredPokemonEvolutionsDao->insertPokemonEvolutions($pokemon->getEvolutions());
//                $this->registeredPokemonTypeAffinities->insertPokemonAffinities($pokemon->getResistances(), $pokemon->getVulnerabilities());

                return $pokemon;
            }

            return null;
        }
//
//        $knownPokemonData = $this->registeredPokemonStatDao->getPokemonStatByName($id);
//        $knownPokemonData = $this->registeredPokemonEvolutionsDao->getPokemonEvolutionsByName($id);
//        $knownPokemonData = $this->registeredPokemonTypeAffinities->getPokemonTypeAffinitiesByName($id);

        return $this->pokemonDataMapper->mapToPokemonFromDaos($knownPokemonData);
    }
}