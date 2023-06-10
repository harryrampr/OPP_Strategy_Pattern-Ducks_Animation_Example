<?php /** @noinspection PhpExpressionResultUnusedInspection */

namespace Tests;

use App\FlyNoWay;
use App\RubberDuck;
use App\Squeak;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class RubberDuckTest
 *
 * This class contains unit tests for the RubberDuck class.
 */
class RubberDuckTest extends TestCase
{
    /**
     * Tests that RubberDuck is a subclass of Duck class.
     */
    public function testRubberDuckIsASubclassOfDuckClass(): void
    {
        $rubberDuckReflection = new ReflectionClass(RubberDuck::class);
        $this->assertTrue($rubberDuckReflection->isSubclassOf('App\Duck'));
    }

    /**
     * Tests that all expected methods exist in the RubberDuck class.
     */
    public function testRubberDuckMethodsExist(): void
    {
        $reflection = new ReflectionClass(RubberDuck::class);
        $methods = $reflection->getMethods();
        $expected = [
            '__construct' => [
                'access' => 'public',
                'return' => '',
            ],
            'display' => [
                'access' => 'public',
                'return' => 'void',
            ],
            'setFlyBehavior' => [
                'access' => 'public',
                'return' => 'void',
            ],
            'setQuackBehavior' => [
                'access' => 'public',
                'return' => 'void',
            ],
            'performQuack' => [
                'access' => 'public',
                'return' => 'void',
            ],
            'performFly' => [
                'access' => 'public',
                'return' => 'void',
            ],
            'swim' => [
                'access' => 'public',
                'return' => 'void',
            ],
        ];

        foreach ($methods as $method) {
            $name = $method->getName();
            $this->assertArrayHasKey($name, $expected);

            // Match access type, but not return type
            match ($expected[$name]['access']) {
                'public' => $this->assertTrue($method->isPublic()),
                'protected' => $this->assertTrue($method->isProtected()),
                'private' => $this->assertTrue($method->isPrivate()),
                default => $this->fail('Unexpected access type'),
            };

            $this->assertSame($expected[$name]['return'], $method->hasReturnType() ? $method->getReturnType()->getName() : '');
        }
    }

    /**
     * Tests that the RubberDuck constructor calls the parent constructor and sets the expected properties.
     */
    public function testRubberDuckConstructorCallsParentConstructor()
    {
        $child = new RubberDuck();
        $expectedResults = [
            'quackBehavior' => new Squeak(),
            'flyBehavior' => new FlyNoWay(),
        ];

        $reflectionClass = new ReflectionClass($child);
        foreach ($expectedResults as $propertyName => $expectedResult) {
            $property = $reflectionClass->getProperty($propertyName);
            $property->setAccessible(true);
            $this->assertSame(get_class($expectedResult), get_class($property->getValue($child)));
        }
    }

    /**
     * Tests that the display method of the RubberDuck class returns a string.
     */
    public function testRubberDuckDisplayMethodReturnsString()
    {
        $rubberDuck = new RubberDuck();
        $this->expectOutputString('<p>The duck displays as a RubberDuck</p>' . PHP_EOL);
        $rubberDuck->display();
    }
}