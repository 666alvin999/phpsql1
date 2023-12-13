<?php
class GenMapper {

    public function createGenArray(array $gensArray): array {
        $gens = [];

        foreach ($gensArray as $gen) {
            $gens[] = $gen;
        }

        return $gens;
    }

}