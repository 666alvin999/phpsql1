<?php

class TypeAffinity {

    private string $name;
    private float $damageMultiplier;

    public function __construct(string $name, float $damageMultiplier) {
        $this->name = $name;
        $this->damageMultiplier = $damageMultiplier;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDamageMultiplier(): float {
        return $this->damageMultiplier;
    }

}