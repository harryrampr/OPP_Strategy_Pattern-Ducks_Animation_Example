<?php
declare(strict_types=1);

namespace App;

/**
 * Class FlyWithWings
 *
 * The FlyWithWings class represents a fly behavior where the duck flies with wings.
 * It implements the FlyBehaviorInterface.
 */
class FlyWithWings implements FlyBehaviorInterface
{
    /**
     * Makes the duck fly using its wings.
     */
    public function fly(): void
    {
        echo '<p>The duck flies</p>', PHP_EOL;
    }
}