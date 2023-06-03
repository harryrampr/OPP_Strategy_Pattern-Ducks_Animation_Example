<?php
declare(strict_types=1);

namespace App;

class MallardDuck extends Duck
{

    public function display(): void
    {
        echo '<p>The duck displays as a Mallard Duck</p>', PHP_EOL;
    }

}