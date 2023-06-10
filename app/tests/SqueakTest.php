<?php

namespace Tests;

use App\QuackBehaviorInterface;
use App\Squeak;
use PHPUnit\Framework\TestCase;

/**
 * Class SqueakTest
 *
 * This class contains unit tests for the Squeak class.
 */
class SqueakTest extends TestCase
{
    /**
     * Tests that Squeak class implements the QuackBehaviorInterface.
     */
    public function testSqueakImplementsQuackBehaviorInterface(): void
    {
        $squeakReflection = new \ReflectionClass(Squeak::class);
        $this->assertTrue($squeakReflection->implementsInterface(QuackBehaviorInterface::class));
    }

    /**
     * Tests that the Squeak class has the expected quack method.
     */
    public function testSqueakQuackMethodExists(): void
    {
        $reflection = new \ReflectionClass(Squeak::class);
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

            // Match access type
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
     * Tests that the quack method of the Squeak class outputs the expected string.
     */
    public function testSqueakQuackMethodOutputsSqueak(): void
    {
        $squeak = new Squeak();
        $this->expectOutputString('<p>The duck squeaks</p>' . PHP_EOL);
        $squeak->quack();
    }
}