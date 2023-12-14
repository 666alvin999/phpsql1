<?php



include_once "backend/domain/beans/Pokemon.php";
include_once "backend/infrastructure/fetcher/PokemonDataFetcher.php";
include_once "backend/infrastructure/mapper/PokemonDataMapper.php";
include_once "backend/domain/port/PokemonPort.php";

class PokemonDataAdapter implements PokemonPort {

    private PokemonDataFetcher $pokemonDataFetcher;
    private RegisteredPokemonDataDao $registeredPokemonDataDao;
    private RegisteredPokemonStatsDao $registeredPokemonStatsDao;
    private RegisteredPokemonEvolutionsDao $registeredPokemonEvolutionsDao;
    private RegisteredPokemonTypeAffinitiesDao $registeredPokemonTypeAffinitiesDao;
    private PokemonDataMapper $pokemonDataMapper;

    public function __construct(PokemonDataFetcher $pokemonDataFetcher, RegisteredPokemonDataDao $registeredPokemonDataDao, RegisteredPokemonStatsDao $registeredPokemonStatsDao, RegisteredPokemonEvolutionsDao $registeredPokemonEvolutionsDao, RegisteredPokemonTypeAffinitiesDao $registeredPokemonTypeAffinitiesDao, PokemonDataMapper $pokemonDataMapper) {
        $this->pokemonDataFetcher = $pokemonDataFetcher;
        $this->registeredPokemonDataDao = $registeredPokemonDataDao;
        $this->registeredPokemonStatsDao = $registeredPokemonStatsDao;
        $this->registeredPokemonEvolutionsDao = $registeredPokemonEvolutionsDao;
        $this->registeredPokemonTypeAffinitiesDao = $registeredPokemonTypeAffinitiesDao;
        $this->pokemonDataMapper = $pokemonDataMapper;
    }


    public function getPokemonByName(string $name): ?Pokemon {
        $knownPokemonData = $this->registeredPokemonDataDao->getPokemonDataByName($name);

        if (!$knownPokemonData) {
            $pokemonData = $this->pokemonDataFetcher->fetchPokemonDataByName($name);

            if ($pokemonData) {
                $pokemon = $this->pokemonDataMapper->mapToPokemonFromFetcher($pokemonData);
                $this->registeredPokemonDataDao->insertPokemonData($pokemon);
                $this->registeredPokemonStatsDao->insertPokemonStat($pokemon);
                $this->registeredPokemonEvolutionsDao->insertPokemonEvolutions($pokemon);
                $this->registeredPokemonTypeAffinitiesDao->insertPokemonTypeAffinities($pokemon);

                return $pokemon;
            }

            return null;
        }

        $knownPokemonStats = $this->registeredPokemonStatsDao->getPokemonStatById($knownPokemonData->ID);
        $knownPokemonEvolutions = $this->registeredPokemonEvolutionsDao->getPokemonEvolutionsById($knownPokemonData->ID);
        $typeAffinities = $this->registeredPokemonTypeAffinitiesDao->getPokemonTypeAffinitiesById($knownPokemonData->ID);

        return $this->pokemonDataMapper->mapToPokemonFromDaos($knownPokemonData, $knownPokemonStats, $knownPokemonEvolutions, $typeAffinities);
    }

    public function getPokemonByType(string $type): array {
        $knownPokemonDataArray = $this->registeredPokemonDataDao->getPokemonByType($type);

        $pokemons = [];

        foreach ($knownPokemonDataArray as $knownPokemonData) {
            $knownPokemonStats = $this->registeredPokemonStatsDao->getPokemonStatById($knownPokemonData->ID);
            $knownPokemonEvolutions = $this->registeredPokemonEvolutionsDao->getPokemonEvolutionsById($knownPokemonData->ID);
            $knownPokemonTypeAffinities = $this->registeredPokemonTypeAffinitiesDao->getPokemonTypeAffinitiesById($knownPokemonData->ID);

            $pokemons[] = $this->pokemonDataMapper->mapToPokemonFromDaos($knownPokemonData, $knownPokemonStats, $knownPokemonEvolutions, $knownPokemonTypeAffinities);
        }

        return $pokemons;
    }

    public function getPokemonByGen(int $gen): array {
        $knownPokemonDataArray = $this->registeredPokemonDataDao->getPokemonByGen($gen);

        $pokemons = [];

        foreach ($knownPokemonDataArray as $knownPokemonData) {
            $knownPokemonStats = $this->registeredPokemonStatsDao->getPokemonStatById($knownPokemonData->ID);
            $knownPokemonEvolutions = $this->registeredPokemonEvolutionsDao->getPokemonEvolutionsById($knownPokemonData->ID);
            $knownPokemonTypeAffinities = $this->registeredPokemonTypeAffinitiesDao->getPokemonTypeAffinitiesById($knownPokemonData->ID);

            $pokemons[] = $this->pokemonDataMapper->mapToPokemonFromDaos($knownPokemonData, $knownPokemonStats, $knownPokemonEvolutions, $knownPokemonTypeAffinities);
        }

        return $pokemons;
    }

    public function getPokemonById(int $id): ?Pokemon {
        $knownPokemonData = $this->registeredPokemonDataDao->getPokemonDataById($id);

        if (!$knownPokemonData) {
            $pokemonData = $this->pokemonDataFetcher->fetchPokemonDataById($id);

            if ($pokemonData) {
                $pokemon = $this->pokemonDataMapper->mapToPokemonFromFetcher($pokemonData);
                $this->registeredPokemonDataDao->insertPokemonData($pokemon);
                $this->registeredPokemonStatsDao->insertPokemonStat($pokemon);
                $this->registeredPokemonEvolutionsDao->insertPokemonEvolutions($pokemon);
                $this->registeredPokemonTypeAffinitiesDao->insertPokemonTypeAffinities($pokemon);

                return $pokemon;
            }

            return null;
        }

        $knownPokemonStats = $this->registeredPokemonStatsDao->getPokemonStatById($id);
        $knownPokemonEvolutions = $this->registeredPokemonEvolutionsDao->getPokemonEvolutionsById($id);
        $knownPokemonTypeAffinities = $this->registeredPokemonTypeAffinitiesDao->getPokemonTypeAffinitiesById($id);

        return $this->pokemonDataMapper->mapToPokemonFromDaos($knownPokemonData, $knownPokemonStats, $knownPokemonEvolutions, $knownPokemonTypeAffinities);
    }

    public function getAllPokemons(): array {
        $knownPokemonDataArray = $this->registeredPokemonDataDao->getAllPokemonData();

        $pokemons = [];

        foreach ($knownPokemonDataArray as $knownPokemonData) {
            $knownPokemonStats = $this->registeredPokemonStatsDao->getPokemonStatById($knownPokemonData->ID);
            $knownPokemonEvolutions = $this->registeredPokemonEvolutionsDao->getPokemonEvolutionsById($knownPokemonData->ID);
            $knownPokemonTypeAffinities = $this->registeredPokemonTypeAffinitiesDao->getPokemonTypeAffinitiesById($knownPokemonData->ID);

            $pokemons[] = $this->pokemonDataMapper->mapToPokemonFromDaos($knownPokemonData, $knownPokemonStats, $knownPokemonEvolutions, $knownPokemonTypeAffinities);
        }

        return $pokemons;
    }

    public function getAllPokemonTypes(): array {
        return PokemonDataTransformer::createTypesArrayFromDaoTypes($this->registeredPokemonDataDao->getAllPokemonTypes());
    }

    public function getAllPokemonGens(): array {
        return PokemonDataTransformer::createGenArrayFromDaoGens($this->registeredPokemonDataDao->getAllPokemonGens());
    }

}