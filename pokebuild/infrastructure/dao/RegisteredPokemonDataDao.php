<?php

class RegisteredPokemonDataDao {

    private string $db_host = "localhost";
    private string $db_name = "pokebuild";
    private string $db_user = "root";
    private string $db_password = "root";

    private PDO $database;

    public function __construct() {
        try {
            $this->database = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_password);
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->database->exec("set names utf8");
        } catch (PDOException $exception) {
            print('Erreur : ' . $exception->getMessage() . '<br/>');
        }
    }

    public function getPokemonById(int $id): Object|bool {
        $query = $this->database->prepare("SELECT * FROM POKEMON WHERE ID = $id");
        $query->execute();
        return $query->fetch();
    }

    public function getPokemonDataByName(string $name): Object|bool {
        $query = $this->database->prepare("SELECT * FROM POKEMON WHERE NAME LIKE '" . $name . "';");
        $query->execute();
        return $query->fetch();
    }

    public function insertPokemonData(Pokemon $pokemon) {
        $typefield = $pokemon->getTypes()[0]->name;

        if (count($pokemon->getTypes()) == 2) {
            $typefield = $typefield . ';' . $pokemon->getTypes()[1]->name;
        }

        $sql = 'INSERT INTO POKEMON (ID, POKEDEX_ID, NAME, ABILITY, IMAGE_URL, SPRITE_URL, TYPES, GENERATION, PRE_EVOLUTION) VALUES ('
            . $pokemon->getId() . ","
            . $pokemon->getPokedexId() . ", "
            . "'" . $pokemon->getName() . "', "
            . "'" . $pokemon->getAbility() . "', "
            . "'" . $pokemon->getImageUrl() . "', "
            . "'" . $pokemon->getSpriteUrl() . "', "
            . "'" . $typefield . "', "
            . $pokemon->getGeneration() . ", ";

        if (gettype($pokemon->getPreEvolution()) != "string") {
            $sql = $sql . $pokemon->getPreEvolution()->getPokedexId();
        } else {
            $sql = $sql . 'NULL';
        }

        $sql = $sql . ');';

        $this->database->prepare($sql)->execute();
    }

}