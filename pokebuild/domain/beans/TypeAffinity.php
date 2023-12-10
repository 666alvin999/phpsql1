<?php

class TypeAffinity {

    private string $typeName;
    private float $damageMultiplier;

    public function __construct(string $name, float $damageMultiplier) {
        $this->typeName = $name;
        $this->damageMultiplier = $damageMultiplier;
    }

    public function getTypeName(): string {
        return $this->typeName;
    }

    public function getDamageMultiplier(): float {
        return $this->damageMultiplier;
    }

}