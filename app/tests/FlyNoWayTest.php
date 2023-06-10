<?php

namespace Tests;

use App\FlyBehaviorInterface;
use App\FlyNoWay;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class FlyNoWayTest extends TestCase
{
// test FlyNoWay implements FlyBehaviorInterface
    public function testFlyNoWayImplementsFlyBehaviorInterface(): void
    {
        $flyNoWayReflection = new \ReflectionClass(FlyNoWay::class);
        $this->assertTrue($flyNoWayReflection->implementsInterface('App\FlyBehaviorInterface'));
    }

    /**
     * Test that FlyNoWay class methods exist and have the correct access and return type.
     */
    public function testFlyNoWayMethodsExist(): void
    {
        $reflection = new ReflectionClass(FlyNoWay::class);
        $methods = $reflection->getMethods();
        $expected = [
            'fly' => [
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


    public function testFlyNoWayFlyMethod(): void
    {
        $flyNoWay = new FlyNoWay();
        $this->expectOutputString("<p>The duck can't fly</p>" . PHP_EOL);
        $flyNoWay->fly();
    }
}