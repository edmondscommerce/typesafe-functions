<?php

namespace ts\Tests\Small\Reflection;

use PHPUnit\Framework\TestCase;
use ts\Reflection\ReflectionMethod;

class ReflectionMethodTest extends TestCase
{

    private const TEST_METHOD_NAME = 'getName';

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
        self::assertFalse(self::$instance->isStatic());
    }

    public function testIsFinal(): void
    {
        self::assertFalse(self::$instance->isFinal());
    }

    public function testIsAbstract(): void
    {
        self::assertFalse(self::$instance->isAbstract());
    }

    public function testConstructFromReflectionMethod(): void
    {
        $actual = self::$instance->constructFromReflectionMethod(self::$raw);
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
        $actual   = self::$instance->isPublic($this);
        $expected = self::$raw->isPublic($this);
        self::assertSame($expected, $actual);
    }

    public function testIsConstructor(): void
    {
        $actual   = self::$instance->isConstructor($this);
        $expected = self::$raw->isConstructor($this);
        self::assertSame($expected, $actual);
    }

    public function testIsProtected(): void
    {
        $actual   = self::$instance->isProtected($this);
        $expected = self::$raw->isProtected($this);
        self::assertSame($expected, $actual);
    }

    public function testSetAccessible(): void
    {
        self::$instance->setAccessible(true);
        self::assertTrue(true);

    }

    public function testIsPrivate(): void
    {
        $actual   = self::$instance->isPrivate($this);
        $expected = self::$raw->isPrivate($this);
        self::assertSame($expected, $actual);
    }

    public function testInvoke(): void
    {
        $actual   = self::$instance->invoke($this);
        $expected = self::$raw->invoke($this);
        self::assertSame($expected, $actual);
    }
}
