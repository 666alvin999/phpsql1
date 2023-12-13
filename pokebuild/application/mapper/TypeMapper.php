<?php
class TypeMapper {

    public function createTypesArray(array $typesArray): array {
        $types = [];

        foreach ($typesArray as $type) {
            $types[] = array(
                'typeName' => $type->getTypeName(),
                'imageUrl' => $type->getImageUrl()
            );
        }

        return $types;
    }

}