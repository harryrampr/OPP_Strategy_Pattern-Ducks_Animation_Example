<?php
declare(strict_types=1);

use App\MallardDuck;
use App\RubberDuck;

require_once __DIR__ . '/../../vendor/autoload.php';

echo '<h1>Duck Animation Simulation</h1>', PHP_EOL;

$d1 = new MallardDuck();
echo '<h2>', basename(get_class($d1)), '</h2>', PHP_EOL;
$d1->performQuack();
$d1->performFly();
$d1->swim();
$d1->display();


$d2 = new RubberDuck();
echo '<h2>', basename(get_class($d2)), '</h2>', PHP_EOL;
$d2->performQuack();
$d2->performFly();
$d2->swim();
$d2->display();