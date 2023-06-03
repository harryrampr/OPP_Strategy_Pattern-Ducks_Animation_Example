<?php
declare(strict_types=1);

namespace App;

class MuteQuack implements QuackBehaviorInterface
{

    public function quack(): void
    {
        echo '<p>The duck can\'t quacks</p>', PHP_EOL;
    }
}