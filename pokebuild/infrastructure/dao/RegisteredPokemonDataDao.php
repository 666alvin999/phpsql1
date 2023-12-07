<?php

namespace infrastructure\dao;

use domain\beans\Pokemon;
use PDO;
use PDOException;

class RegisteredPokemonDataDao {

    private string $db_host = "localhost:8889";
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
            print("Erreur: $exception->errorInfo");
        }
    }

    public function getPokemonById(int $id): Pokemon {
        $query = $this->database->prepare("SELECT * FROM POKEMON WHERE ID = $id");
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function fetchPokemonDataByName(string $name) {
    }

    public function fetchPokemonDataById(int $id) {
    }

}