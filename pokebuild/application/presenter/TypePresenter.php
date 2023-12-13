<?php

include_once "domain/port/TypePresenterPort.php";

class TypePresenter implements TypePresenterPort {

    private TypeMapper $typeService;

    public function __construct(TypeMapper $typeService) {
        $this->typeService = $typeService;
    }

    public function present(array $types): false|string {
        return json_encode($this->typeService->createTypesArray($types));
    }


}