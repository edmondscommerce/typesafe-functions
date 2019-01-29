<?php

namespace ts\Tests\Small\Reflection;

use PHPUnit\Framework\TestCase;
use ts\Reflection\ReflectionMethod;

class ReflectionMethodTest extends TestCase
{

    private const TEST_METHOD_NAME = 'setUpBeforeClass';

    /**
     * @var ReflectionMethod
     */
    private static $instance;

    /**
     * @var \ReflectionMethod
     */
    private static $raw;

    /**
     * @throws \ReflectionException
     */
    public static function setUpBeforeClass(): void
    {
        self::$instance = new ReflectionMethod(self::class, self::TEST_METHOD_NAME);
        self::$raw      = new \ReflectionMethod(self::class, self::TEST_METHOD_NAME);
    }

    public function testGetPrototype(): void
    {
        $actual = self::$instance->getPrototype();
        self::assertInstanceOf(ReflectionMethod::class, $actual);
    }

    public function testIsStatic(): void
    {
        $actual   = self::$instance->isStatic();
        $expected = self::$raw->isStatic();
        self::assertSame($expected, $actual);
    }

    public function testIsFinal(): void
    {
        $actual   = self::$instance->isFinal();
        $expected = self::$raw->isFinal();
        self::assertSame($expected, $actual);
    }

    public function testIsAbstract(): void
    {
        $actual   = self::$instance->isAbstract();
        $expected = self::$raw->isAbstract();
        self::assertSame($expected, $actual);
    }

    public function testConstructFromReflectionMethod(): void
    {
        $actual = self::$instance::constructFromReflectionMethod(self::$raw);
        self::assertInstanceOf(ReflectionMethod::class, $actual);
    }

    public function testGetClosure(): void
    {
        $actual = self::$instance->getClosure($this);
        self::assertInstanceOf(\Closure::class, $actual);
    }

    public function testInvokeArgs(): void
    {
        $actual   = self::$instance->invokeArgs($this, []);
        $expected = self::$raw->invokeArgs($this, []);
        self::assertSame($expected, $actual);
    }

    public function testIsPublic(): void
    {
        $actual   = self::$instance->isPublic();
        $expected = self::$raw->isPublic();
        self::assertSame($expected, $actual);
    }

    public function testIsConstructor(): void
    {
        $actual   = self::$instance->isConstructor();
        $expected = self::$raw->isConstructor();
        self::assertSame($expected, $actual);
    }

    public function testIsProtected(): void
    {
        $actual   = self::$instance->isProtected();
        $expected = self::$raw->isProtected();
        self::assertSame($expected, $actual);
    }

    public function testSetAccessible(): void
    {
        self::$instance->setAccessible(true);
        self::assertTrue(true);

    }

    public function testIsPrivate(): void
    {
        $actual   = self::$instance->isPrivate();
        $expected = self::$raw->isPrivate();
        self::assertSame($expected, $actual);
    }

    public function testInvoke(): void
    {
        $actual   = self::$instance->invoke($this);
        $expected = self::$raw->invoke($this);
        self::assertSame($expected, $actual);
    }


}
