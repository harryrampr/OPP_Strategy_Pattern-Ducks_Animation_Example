<?php

namespace Tests;

use App\FlyWithWings;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class FlyWithWingsTest
 *
 * This class contains unit tests for the FlyWithWings class.
 */
class FlyWithWingsTest extends TestCase
{
    /**
     * Test if FlyWithWings implements the FlyBehaviorInterface.
     *
     * @return void
     */
    public function testFlyWithWingsImplementsFlyBehaviorInterface(): void
    {
        $flyWithWingsReflection = new \ReflectionClass(FlyWithWings::class);
        $this->assertTrue($flyWithWingsReflection->implementsInterface('App\FlyBehaviorInterface'));
    }

    /**
     * Test that FlyWithWings class methods exist and have the correct access and return type.
     */
    public function testFlyNoWayMethodsExist(): void
    {
        $reflection = new ReflectionClass(FlyWithWings::class);
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


    /**
     * Test the fly method of FlyWithWings.
     *
     * This test verifies that the fly method of FlyWithWings outputs the expected HTML string.
     *
     * @return void
     */
    public function testFlyWithWingsFlyMethod(): void
    {
        $flyWithWings = new FlyWithWings();
        $this->expectOutputString("<p>The duck flies</p>" . PHP_EOL);
        $flyWithWings->fly();
    }
}