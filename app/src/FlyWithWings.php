<?php
declare(strict_types=1);

namespace App;

class FlyWithWings implements FlyBehaviorInterface
{

    public function fly(): void
    {
        echo '<p>The duck flies</p>', PHP_EOL;
    }
}