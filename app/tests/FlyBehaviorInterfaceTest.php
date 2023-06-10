<?php

namespace Tests;

use App\FlyBehaviorInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class FlyBehaviorInterfaceTest
 *
 * This class contains unit tests for the FlyBehaviorInterface.
 */
class FlyBehaviorInterfaceTest extends TestCase
{
    /**
     * Test if FlyBehaviorInterface is an interface.
     *
     * @return void
     */
    public function testFlyBehaviorInterfaceIsInterface(): void
    {
        $reflection = new ReflectionClass(FlyBehaviorInterface::class);
        $this->assertTrue($reflection->isInterface());
    }

    /**
     * Test if FlyBehaviorInterface methods exist.
     *
     * @return void
     */
    public function testFlyBehaviorInterfaceMethodsExist(): void
    {
        $reflection = new ReflectionClass(FlyBehaviorInterface::class);
        $methods = $reflection->getMethods();
        $expected = [
            'fly' => [
                'access' => 'public',
                'static' => false,
                'return' => '',
            ],
        ];
        foreach ($methods as $method) {
            $name = $method->getName();
            $this->assertArrayHasKey($name, $expected);

            // match access type, but not type
            match ($expected[$name]['access']) {
                'public' => $this->assertTrue($method->isPublic()),
                'protected' => $this->assertTrue($method->isProtected()),
                'private' => $this->assertTrue($method->isPrivate()),
                default => $this->fail('Unexpected access type'),
            };

            $this->assertSame($expected[$name]['static'], $method->isStatic());
            $this->assertSame($expected[$name]['return'],
                $method->hasReturnType() ? $method->getReturnType()->getName() : '');
        }
    }
}