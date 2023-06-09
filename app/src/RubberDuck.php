<?php
declare(strict_types=1);

namespace App;
/**
 * Class RubberDuck
 *
 * The RubberDuck class represents a specific type of duck called Rubber Duck.
 * It extends the Duck class and provides its own implementation of the display method.
 */
class RubberDuck extends Duck
{
    /**
     * RubberDuck constructor.
     * Initializes the RubberDuck object with a Squeak quack behavior and FlyNoWay fly behavior.
     */
    public function __construct()
    {
        parent::__construct(new Squeak(), new FlyNoWay());
    }

    /**
     * Displays the RubberDuck.
     * Prints a message indicating that the duck is displayed as a RubberDuck.
     */
    public function display(): void
    {
        echo '<p>The duck displays as a RubberDuck</p>', PHP_EOL;
    }
}