<?php

namespace Tests;

use App\Quack;
use App\QuackBehaviorInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class QuackTest
 *
 * This class contains unit tests for the Quack class.
 */
class QuackTest extends TestCase
{
    /**
     * Test if Quack implements QuackBehaviorInterface.
     *
     * @return void
     */
    public function testQuackImplementsQuackBehaviorInterface(): void
    {
        $quackReflection = new \ReflectionClass(Quack::class);
        $this->assertTrue($quackReflection->implementsInterface('App\QuackBehaviorInterface'));
    }

    /**
     * Test that Quack class methods exist and have the correct access and return type.
     *
     * This test verifies that the Quack class has a public method named "quack" with a void return type.
     *
     * @return void
     */
    public function testQuackMethodsExist(): void
    {
        $reflection = new \ReflectionClass(Quack::class);
        $methods = $reflection->getMethods();
        $expected = [
            'quack' => [
                'access' => 'public',
                'return' => 'void',
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
     * Test the quack method of Quack.
     *
     * This test verifies that the quack method of Quack outputs the expected HTML string.
     *
     * @return void
     */
    public function testQuackQuackMethod(): void
    {
        $quack = new Quack();
        $this->expectOutputString("<p>The duck quacks</p>" . PHP_EOL);
        $quack->quack();
    }
}