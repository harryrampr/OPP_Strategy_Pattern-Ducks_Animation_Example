<?php
declare(strict_types=1);

namespace App;

abstract class Duck
{
    protected QuackBehaviorInterface $quackBehavior;

    protected FlyBehaviorInterface $flyBehavior;

    public function __construct(QuackBehaviorInterface $quackBehavior = new Quack(),
                                FlyBehaviorInterface   $flyBehavior = new FlyWithWings())
    {
        $this->quackBehavior = $quackBehavior;
        $this->flyBehavior = $flyBehavior;
    }

    /**
     * @param FlyBehaviorInterface $flyBehavior
     */
    public function setFlyBehavior(FlyBehaviorInterface $flyBehavior): void
    {
        $this->flyBehavior = $flyBehavior;
    }

    /**
     * @param QuackBehaviorInterface $quackBehavior
     */
    public function setQuackBehavior(QuackBehaviorInterface $quackBehavior): void
    {
        $this->quackBehavior = $quackBehavior;
    }

    public function swim(): void
    {
        echo '<p>The duck swims</p>', PHP_EOL;
    }

    abstract public function display();

    public function performQuack(): void
    {
        $this->quackBehavior->quack();
    }

    public function performFly(): void
    {
        $this->flyBehavior->fly();
    }
}