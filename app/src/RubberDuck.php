<?php
declare(strict_types=1);

namespace App;

class RubberDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(new Squeak(), new FlyNoWay());
    }

    public function display(): void
    {
        echo '<p>The duck displays as a RubberDuck</p>', PHP_EOL;
    }
}