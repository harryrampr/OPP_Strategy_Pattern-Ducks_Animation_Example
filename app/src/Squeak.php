<?php
declare(strict_types=1);

namespace App;

class Squeak implements QuackBehaviorInterface
{

    public function quack(): void
    {
        echo '<p>The duck squeaks</p>', PHP_EOL;
    }
}