<?php
declare(strict_types=1);

namespace App;

/**
 * Class MuteQuack
 *
 * The MuteQuack class represents a behavior where the duck cannot quack.
 * It implements the QuackBehaviorInterface.
 */
class MuteQuack implements QuackBehaviorInterface
{
    /**
     * Performs the mute quack behavior.
     * The duck cannot quack.
     */
    public function quack(): void
    {
        echo '<p>The duck can\'t quack</p>', PHP_EOL;
    }
}