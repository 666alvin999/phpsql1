<?php

class Type {

    private string $typeName;
    private string $imageUrl;

    public function __construct(string $typeName, string $imageUrl) {
        $this->typeName = $typeName;
        $this->imageUrl = $imageUrl;
    }

    public function getTypeName(): string {
        return $this->typeName;
    }

    public function getImageUrl(): string {
        return $this->imageUrl;
    }

}