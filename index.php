<?php

$thailandSurpise = [
    'name' => 'miniskirt',
];

$clothes = new Item ('Miniskirt');

class ThailandSurpise {
    public $clothes;

    public function __construct($clothes)
    {
        $this->clothes = $clothes;
    }
}

var_dump($clothes);
?>