<?php

class ThailandSurprise
{
    public $clothes;
    public $quantity;
    public $color;
}

$sijonas = new ThailandSurprise();

$sijonas->clothes = 'miniskirt';
$sijonas->quantity = 15;
$sijonas->color = 'black & yellow';


var_dump($sijonas);
?>