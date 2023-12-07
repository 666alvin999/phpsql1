<?php

namespace domain\beans;
class Stat {

    private int $hp;
    private int $attack;
    private int $defense;
    private int $speAttack;
    private int $speDef;
    private int $speed;

    public function __construct(int $hp, int $attack, int $defense, int $speAttack, int $speDef, int $speed) {
        $this->hp = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->speAttack = $speAttack;
        $this->speDef = $speDef;
        $this->speed = $speed;
    }


    public function getHp(): int {
        return $this->hp;
    }

    public function getAttack(): int {
        return $this->attack;
    }

    public function getDefense(): int {
        return $this->defense;
    }

    public function getSpeAttack(): int {
        return $this->speAttack;
    }

    public function getSpeDef(): int {
        return $this->speDef;
    }

    public function getSpeed(): int {
        return $this->speed;
    }


}