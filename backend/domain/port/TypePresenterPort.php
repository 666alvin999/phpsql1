<?php

interface TypePresenterPort {

    public function present(array $types): false|string;

}