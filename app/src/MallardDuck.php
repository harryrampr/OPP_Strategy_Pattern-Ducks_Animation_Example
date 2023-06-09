<?php
declare(strict_types=1);

namespace App;

/**
 * Class MallardDuck
 *
 * The MallardDuck class represents a specific type of Duck, which is a Mallard Duck.
 * It extends the abstract Duck class.
 */
class MallardDuck extends Duck
{
    /**
     * Displays the Mallard Duck.
     */
    public function display(): void
    {
        echo '<p>The duck displays as a Mallard Duck</p>', PHP_EOL;
    }
}