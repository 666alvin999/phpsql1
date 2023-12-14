<?php



include_once "backend/domain/port/GenPresenterPort.php";

class GenPresenter implements GenPresenterPort {

    private GenMapper $genMapper;

    public function __construct(GenMapper $genMapper) {
        $this->genMapper = $genMapper;
    }

    public function present(array $gens): false|string {
        return json_encode($this->genMapper->createGenArray($gens));
    }


}