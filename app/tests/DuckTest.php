<?php /** @noinspection PhpExpressionResultUnusedInspection */

namespace Tests;

use App\Duck;
use App\FlyBehaviorInterface;
use App\QuackBehaviorInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class DuckTest
 *
 * PHPUnit test case for the Duck class.
 * Verifies the behavior and properties of the Duck class.
 */
class DuckTest extends TestCase
{
    /**
     * Test that Duck class is abstract.
     */
    public function testDuckIsAbstract(): void
    {
        $reflection = new ReflectionClass(Duck::class);
        $this->assertTrue($reflection->isAbstract());
    }

    /**
     * Test that Duck class properties exist and have the correct access and type.
     */
    public function testDuckPropertiesExist(): void
    {
        $reflection = new ReflectionClass(Duck::class);
        $properties = $reflection->getProperties();
        $expected = [
            'quackBehavior' => [
                'access' => 'protected',
                'type' => 'App\QuackBehaviorInterface',
            ],
            'flyBehavior' => [
                'access' => 'protected',
                'type' => 'App\FlyBehaviorInterface',
            ],
        ];
        foreach ($properties as $property) {
            $name = $property->getName();
            $this->assertArrayHasKey($name, $expected);

            // match access type, but not type
            match ($expected[$name]['access']) {
                'public' => $this->assertTrue($property->isPublic()),
                'protected' => $this->assertTrue($property->isProtected()),
                'private' => $this->assertTrue($property->isPrivate()),
                default => $this->fail('Unexpected access type'),
            };

            $this->assertSame($expected[$name]['type'], $property->getType()->getName());
        }
    }

    /**
     * Test that Duck class constructor exists and is public.
     */
    public function testDuckConstructorExists(): void
    {
        $reflection = new ReflectionClass(Duck::class);
        $constructor = $reflection->getConstructor();
        $this->assertNotNull($constructor);
        $this->assertTrue($constructor->isPublic());
    }

    /**
     * Test that Duck class constructor updates quackBehavior and flyBehavior.
     */
    public function testDuckConstructorUpdatesQuackBehaviorAndFlyBehavior(): void
    {
        $quackBehavior = $this->createMock(QuackBehaviorInterface::class);
        $flyBehavior = $this->createMock(FlyBehaviorInterface::class);
        $duck = $this->getMockForAbstractClass(Duck::class, [$quackBehavior, $flyBehavior]);

        // use reflection class to get properties
        $reflection = new ReflectionClass($duck);
        $quackBehaviorProperty = $reflection->getProperty('quackBehavior');
        $flyBehaviorProperty = $reflection->getProperty('flyBehavior');

        $this->assertSame($quackBehavior, $quackBehaviorProperty->getValue($duck));
        $this->assertSame($flyBehavior, $flyBehaviorProperty->getValue($duck));
    }

    /**
     * Test that Duck class methods exist and have the correct access and return type.
     */
    public function testDuckMethodsExist(): void
    {
        $reflection = new ReflectionClass(Duck::class);
        $methods = $reflection->getMethods();
        $expected = [
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
            'display' => [
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
     * Test setting the fly behavior for a Duck instance.
     */
    public function testDuckSetFlyBehavior(): void
    {
        $quackBehavior = $this->createMock(QuackBehaviorInterface::class);
        $flyBehavior = $this->createMock(FlyBehaviorInterface::class);
        $duck = $this->getMockForAbstractClass(Duck::class, [$quackBehavior, $flyBehavior]);
        $duck->setFlyBehavior($flyBehavior);

        $reflection = new ReflectionClass($duck);
        $flyBehaviorProperty = $reflection->getProperty('flyBehavior');
        $flyBehaviorProperty->setAccessible(true);

        $this->assertSame($flyBehavior, $flyBehaviorProperty->getValue($duck));
    }

    /**
     * Test setting the quack behavior for a Duck instance.
     */
    public function testDuckSetQuackBehavior(): void
    {
        $quackBehavior = $this->createMock(QuackBehaviorInterface::class);
        $flyBehavior = $this->createMock(FlyBehaviorInterface::class);
        $duck = $this->getMockForAbstractClass(Duck::class, [$quackBehavior, $flyBehavior]);
        $duck->setQuackBehavior($quackBehavior);

        $reflection = new ReflectionClass($duck);
        $quackBehaviorProperty = $reflection->getProperty('quackBehavior');
        $quackBehaviorProperty->setAccessible(true);

        $this->assertSame($quackBehavior, $quackBehaviorProperty->getValue($duck));
    }

    /**
     * Test performing the quack behavior for a Duck instance.
     */
    public function testDuckPerformQuack(): void
    {
        $quackBehavior = $this->createMock(QuackBehaviorInterface::class);
        $flyBehavior = $this->createMock(FlyBehaviorInterface::class);
        $duck = $this->getMockForAbstractClass(Duck::class, [$quackBehavior, $flyBehavior]);
        $quackBehavior->expects($this->once())->method('quack');
        $duck->performQuack();
    }

    /**
     * Test performing the fly behavior for a Duck instance.
     */
    public function testDuckPerformFly(): void
    {
        $quackBehavior = $this->createMock(QuackBehaviorInterface::class);
        $flyBehavior = $this->createMock(FlyBehaviorInterface::class);
        $duck = $this->getMockForAbstractClass(Duck::class, [$quackBehavior, $flyBehavior]);
        $flyBehavior->expects($this->once())->method('fly');
        $duck->performFly();
    }

    /**
     * Test swimming behavior for a Duck instance.
     */
    public function testDuckSwim(): void
    {
        $quackBehavior = $this->createMock(QuackBehaviorInterface::class);
        $flyBehavior = $this->createMock(FlyBehaviorInterface::class);
        $duck = $this->getMockForAbstractClass(Duck::class, [$quackBehavior, $flyBehavior]);
        $this->expectOutputString('<p>The duck swims</p>' . PHP_EOL);
        $duck->swim();
    }

    /**
     * Test that the display method in Duck class is abstract.
     */
    public function testDuckDisplayIsAbstract(): void
    {
        $reflection = new ReflectionClass(Duck::class);
        $method = $reflection->getMethod('display');
        $this->assertTrue($method->isAbstract());
    }
}