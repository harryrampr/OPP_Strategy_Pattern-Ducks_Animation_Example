<?php
declare(strict_types=1);

namespace App;

/**
 * Class FlyNoWay
 *
 * The FlyNoWay class represents a fly behavior where the duck can't fly.
 * It implements the FlyBehaviorInterface.
 */
class FlyNoWay implements FlyBehaviorInterface
{
    /**
     * Makes the duck unable to fly.
     */
    public function fly(): void
    {
        echo '<p>The duck can\'t fly</p>', PHP_EOL;
    }
}