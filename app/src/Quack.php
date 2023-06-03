<?php
declare(strict_types=1);

namespace App;

class Quack implements QuackBehaviorInterface
{

    public function quack(): void
    {
        echo '<p>The duck quacks</p>', PHP_EOL;
    }
}