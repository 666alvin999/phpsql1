<?php

class RegisteredPokemonStatsDao {

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

}