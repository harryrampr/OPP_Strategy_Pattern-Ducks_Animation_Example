<?php
declare(strict_types=1);

namespace App;
/**
 * Class Squeak
 *
 * The Squeak class represents a specific type of quack behavior called Squeak.
 * It implements the QuackBehaviorInterface and provides the implementation for the quack method.
 */
class Squeak implements QuackBehaviorInterface
{
    /**
     * Produces a squeaking sound.
     * Prints a message indicating that the duck squeaks.
     */
    public function quack(): void
    {
        echo '<p>The duck squeaks</p>', PHP_EOL;
    }
}