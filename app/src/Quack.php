<?php
declare(strict_types=1);

namespace App;
/**
 * Class Quack
 *
 * The Quack class represents a behavior where the duck can quack.
 * It implements the QuackBehaviorInterface.
 */
class Quack implements QuackBehaviorInterface
{
    /**
     * Performs the quack behavior.
     * The duck quacks.
     */
    public function quack(): void
    {
        echo '<p>The duck quacks</p>', PHP_EOL;
    }
}