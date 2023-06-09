<?php
declare(strict_types=1);

namespace App;

/**
 * Class Duck
 *
 * The Duck class represents an abstract duck.
 * It defines common behaviors and properties that ducks can have.
 */
abstract class Duck
{
    /**
     * @var QuackBehaviorInterface $quackBehavior The quack behavior of the duck.
     */
    protected QuackBehaviorInterface $quackBehavior;

    /**
     * @var FlyBehaviorInterface $flyBehavior The fly behavior of the duck.
     */
    protected FlyBehaviorInterface $flyBehavior;

    /**
     * Duck constructor.
     *
     * Creates a new Duck instance with the specified quack and fly behaviors.
     *
     * @param QuackBehaviorInterface $quackBehavior The quack behavior to set (default: Quack instance).
     * @param FlyBehaviorInterface $flyBehavior     The fly behavior to set (default: FlyWithWings instance).
     */
    public function __construct(
        QuackBehaviorInterface $quackBehavior = null,
        FlyBehaviorInterface   $flyBehavior = null
    )
    {
        $this->quackBehavior = $quackBehavior ?? new Quack();
        $this->flyBehavior = $flyBehavior ?? new FlyWithWings();
    }

    /**
     * Sets the fly behavior of the duck.
     *
     * @param FlyBehaviorInterface $flyBehavior The fly behavior to set.
     */
    public function setFlyBehavior(FlyBehaviorInterface $flyBehavior): void
    {
        $this->flyBehavior = $flyBehavior;
    }

    /**
     * Sets the quack behavior of the duck.
     *
     * @param QuackBehaviorInterface $quackBehavior The quack behavior to set.
     */
    public function setQuackBehavior(QuackBehaviorInterface $quackBehavior): void
    {
        $this->quackBehavior = $quackBehavior;
    }

    /**
     * Makes the duck swim.
     */
    public function swim(): void
    {
        echo '<p>The duck swims</p>', PHP_EOL;
    }

    /**
     * Displays the duck.
     * This method should be implemented by concrete duck classes.
     */
    abstract public function display();

    /**
     * Performs the quack behavior of the duck.
     */
    public function performQuack(): void
    {
        $this->quackBehavior->quack();
    }

    /**
     * Performs the fly behavior of the duck.
     */
    public function performFly(): void
    {
        $this->flyBehavior->fly();
    }
}