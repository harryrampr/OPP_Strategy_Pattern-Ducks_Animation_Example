<?php

namespace Tests;

use App\QuackBehaviorInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class QuackBehaviorInterfaceTest
 *
 * This class contains unit tests for the QuackBehaviorInterface.
 */
class QuackBehaviorInterfaceTest extends TestCase
{
    /**
     * Test if QuackBehaviorInterface is an interface.
     *
     * This test verifies that QuackBehaviorInterface is declared as an interface.
     *
     * @return void
     */
    public function testQuackBehaviorInterfaceIsAnInterface(): void
    {
        $quackBehaviorInterfaceReflection = new \ReflectionClass(QuackBehaviorInterface::class);
        $this->assertTrue($quackBehaviorInterfaceReflection->isInterface());
    }

    /**
     * Test that QuackBehaviorInterface methods exist and have the correct access and return type.
     *
     * This test verifies that the QuackBehaviorInterface has a public method named "quack" without a return type.
     *
     * @return void
     */
    public function testQuackBehaviorInterfaceMethodsExist(): void
    {
        $reflection = new \ReflectionClass(QuackBehaviorInterface::class);
        $methods = $reflection->getMethods();
        $expected = [
            'quack' => [
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
}