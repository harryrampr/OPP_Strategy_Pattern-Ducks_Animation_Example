<?php
declare(strict_types=1);

namespace App;

/**
 * Interface QuackBehaviorInterface
 *
 * The QuackBehaviorInterface defines the contract for quack behavior of ducks.
 * Classes that implement this interface must provide an implementation for the quack method.
 */
interface QuackBehaviorInterface
{
    /**
     * Performs the quacking behavior.
     * Implementing classes should define their own logic for quacking.
     */
    public function quack();
}