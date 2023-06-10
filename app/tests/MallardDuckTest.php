<?php

namespace Tests;

use App\Duck;
use App\MallardDuck;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class MallardDuckTest
 *
 * This class contains unit tests for the MallardDuck class.
 */
class MallardDuckTest extends TestCase
{
    /**
     * Test if MallardDuck extends Duck.
     *
     * @return void
     */
    public function testMallardDuckExtendsDuck(): void
    {
        $mallardDuckReflection = new ReflectionClass(MallardDuck::class);
        $this->assertTrue($mallardDuckReflection->isSubclassOf('App\Duck'));
    }

    /**
     * Test that MallardDuck class methods exist and have the correct access and return type.
     *
     * @return void
     */
    public function testMallardDuckMethodsExist(): void
    {
        $reflection = new ReflectionClass(MallardDuck::class);
        $methods = $reflection->getMethods();
        $expected = [
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
            '__construct' => [
                'access' => 'public',
                'return' => '',
            ],
        ];

        foreach ($methods as $method) {
            $name = $method->getName();
            $this->assertArrayHasKey($name, $expected);

            // match access type, but not return type
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
     * Test the display method of MallardDuck.
     *
     * This test verifies that the display method of MallardDuck outputs the expected HTML string.
     *
     * @return void
     */
    public function testMallardDuckDisplayMethod(): void
    {
        $mallardDuck = new MallardDuck();
        $this->expectOutputString('<p>The duck displays as a Mallard Duck</p>' . PHP_EOL);
        $mallardDuck->display();
    }
}