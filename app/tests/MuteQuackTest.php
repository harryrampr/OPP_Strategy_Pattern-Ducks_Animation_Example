<?php

namespace Tests;

use App\MuteQuack;
use App\QuackBehaviorInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class MuteQuackTest
 *
 * This class contains unit tests for the MuteQuack class.
 */
class MuteQuackTest extends TestCase
{
    /**
     * Test if MuteQuack implements QuackBehaviorInterface.
     *
     * @return void
     */
    public function testMuteQuackImplementsQuackBehaviorInterface(): void
    {
        $muteQuackReflection = new \ReflectionClass(MuteQuack::class);
        $this->assertTrue($muteQuackReflection->implementsInterface('App\QuackBehaviorInterface'));
    }

    /**
     * Test that MuteQuack class methods exist and have the correct access and return type.
     *
     * This test verifies that the MuteQuack class has a public method named "quack" with a void return type.
     *
     * @return void
     */
    public function testMuteQuackMethodsExist(): void
    {
        $reflection = new \ReflectionClass(MuteQuack::class);
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
     * Test the quack method of MuteQuack.
     *
     * This test verifies that the quack method of MuteQuack outputs the expected HTML string.
     *
     * @return void
     */
    public function testMuteQuackQuackMethod(): void
    {
        $muteQuack = new MuteQuack();
        $this->expectOutputString("<p>The duck can't quack</p>" . PHP_EOL);
        $muteQuack->quack();
    }
}