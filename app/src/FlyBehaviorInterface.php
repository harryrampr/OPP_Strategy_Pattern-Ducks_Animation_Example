<?php
declare(strict_types=1);

namespace App;

/**
 * Interface FlyBehaviorInterface
 *
 * The FlyBehaviorInterface defines the contract for fly behavior of ducks.
 * Classes that implement this interface must provide an implementation for the fly method.
 */
interface FlyBehaviorInterface
{
    /**
     * Performs the flying behavior.
     * Implementing classes should define their own logic for flying.
     */
    public function fly();
}