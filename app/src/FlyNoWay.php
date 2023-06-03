<?php
declare(strict_types=1);

namespace App;

class FlyNoWay implements FlyBehaviorInterface
{

    public function fly(): void
    {
        echo '<p>The duck can\'t fly</p>', PHP_EOL;
    }
}