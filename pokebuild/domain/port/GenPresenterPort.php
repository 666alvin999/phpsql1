<?php

interface GenPresenterPort {

    public function present(array $gens): false|string;

}