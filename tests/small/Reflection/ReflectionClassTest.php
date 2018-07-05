<?php declare(strict_types=1);

namespace ts\Tests\small\Reflection;

use PHPUnit\Framework\TestCase;
use ts\Reflection\ReflectionClass;

class ReflectionClassTest extends TestCase
{

    private const FAKE = 'value';

    public static $fake = 'value';

    /**
     * @var ReflectionClass
     */
    private static $instance;

    /**
     * @var \ReflectionClass
     */
    private static $raw;

    /**
     * @throws \ReflectionException
     */
    public static function setUpBeforeClass()
    {
        self::$instance = new ReflectionClass(self::class);
        self::$raw      = new \ReflectionClass(self::class);
    }

    public function testGetExtensionName()
    {
        $expected = '';
        $actual   = self::$instance->getExtensionName();
        self::assertSame($expected, $actual);
    }

    public function testGetName()
    {
        $expected = self::class;
        $actual   = self::$instance->getName();
        self::assertSame($expected, $actual);
    }

    public function testIsInterface()
    {
        $expected = false;
        $actual   = self::$instance->isInterface();
        self::assertSame($expected, $actual);
    }

    public function testGetExtension()
    {
        $expected = self::$raw->getExtension();
        $actual   = self::$instance->getExtension();
        self::assertSame($expected, $actual);
    }

    public function testGetReflectionConstant()
    {
        $expected = self::$instance->getReflectionConstant('FAKE');
        $actual   = self::$instance->getReflectionConstant('FAKE');
        self::assertEquals($expected, $actual);
    }

    public function testGetStaticPropertyValue()
    {
        $expected = self::$raw->getStaticPropertyValue('fake');
        $actual   = self::$instance->getStaticPropertyValue('fake');
        self::assertEquals($expected, $actual);
    }

    public function testNewInstanceArgs()
    {
        $expected = new \SplFileInfo(__FILE__);
        $actual   = (new ReflectionClass(\SplFileInfo::class))->newInstanceArgs([__FILE__]);
        self::assertEquals($expected, $actual);
    }

    public function testIsUserDefined()
    {
        $expected = true;
        $actual   = self::$instance->isUserDefined();
        self::assertSame($expected, $actual);
    }

    public function testGetConstants()
    {
        $expected = ['FAKE' => self::FAKE];
        $actual   = self::$instance->getConstants();
        self::assertSame($expected, $actual);
    }

    public function testHasConstant()
    {
        $has      = 'FAKE';
        $expected = true;
        $actual   = self::$instance->hasConstant($has);
        self::assertSame($expected, $actual);
        $expected = false;
        $notHas   = 'NOT';
        $actual   = self::$instance->hasConstant($notHas);
        self::assertSame($expected, $actual);
    }

    public function testIsFinal()
    {
        $expected = false;
        $actual   = self::$instance->isFinal();
        self::assertSame($expected, $actual);
    }

    public function testImplementsInterface()
    {
        $expected = false;
        $actual   = self::$instance->implementsInterface(\Iterator::class);
        self::assertSame($expected, $actual);
    }

    public function testIsSubclassOf()
    {
        $expected = false;
        $actual   = self::$instance->isSubclassOf(\IteratorIterator::class);
        self::assertSame($expected, $actual);
    }

    public function testGetFileName()
    {
        $expected = __FILE__;
        $actual   = self::$instance->getFileName();
        self::assertSame($expected, $actual);
    }

    public function testGetMethods()
    {
        $expected = self::$raw->getMethods();
        $actual   = self::$instance->getMethods();
        self::assertEquals($expected, $actual);

        $filter   = \ReflectionMethod::IS_PUBLIC;
        $expected = self::$raw->getMethods($filter);
        $actual   = self::$instance->getMethods($filter);
        self::assertEquals($expected, $actual);
    }

    public function testGetReflectionConstants()
    {
        $expected = self::$raw->getReflectionConstants();
        $actual   = self::$instance->getReflectionConstants();
        self::assertEquals($expected, $actual);
    }

    public function testGetStartLine()
    {
        $expected = self::$raw->getStartLine();
        $actual   = self::$instance->getStartLine();
        self::assertSame($expected, $actual);
    }

    public function testGetStaticProperties()
    {
        $expected = self::$raw->getStaticProperties();
        $actual   = self::$instance->getStaticProperties();
        self::assertSame($expected, $actual);
    }

    public function testSetStaticPropertyValue()
    {
        $expected = 'updated';
        self::$instance->setStaticPropertyValue('fake', $expected);
        self::assertSame($expected, self::$instance->getStaticPropertyValue('fake'));
        self::$instance->setStaticPropertyValue('fake', 'value');
    }

    public function testGetDocComment()
    {
        $expected = '';
        $actual   = self::$instance->getDocComment();
        self::assertSame($expected, $actual);
    }

    public function testNewInstance()
    {
        $expected = new \stdClass();
        $actual   = (new ReflectionClass(\stdClass::class))->newInstance();
        self::assertEquals($expected, $actual);
    }

    public function testIsInternal()
    {
        $expected = false;
        $actual   = self::$instance->isInternal();
        self::assertSame($expected, $actual);
    }

    public function testGetTraitNames()
    {
        $expected = self::$raw->getTraitNames();
        $actual   = self::$instance->getTraitNames();
        self::assertSame($expected, $actual);
    }

    public function testIsTrait()
    {
        $expected = false;
        $actual   = self::$instance->isTrait();
        self::assertSame($expected, $actual);
    }

    public function testIsInstance()
    {
        $object   = new \SplDoublyLinkedList();
        $expected = false;
        $actual   = self::$instance->isInstance($object);
        self::assertSame($expected, $actual);
    }

    public function testIsAbstract()
    {
        $expected = false;
        $actual   = self::$instance->isAbstract();
        self::assertSame($expected, $actual);
    }

    public function testIsIterable()
    {
        $expected = false;
        $actual   = self::$instance->isIterable();
        self::assertSame($expected, $actual);
    }

    public function testGetConstructor()
    {
        $expected = self::$raw->getConstructor();
        $actual   = self::$instance->getConstructor();
        self::assertEquals($expected, $actual);
    }

    public function testHasProperty()
    {
        $expected = false;
        $actual   = self::$instance->hasProperty('no');
        self::assertSame($expected, $actual);
    }

    public function testGetInterfaces()
    {
        $expected = \array_keys(self::$raw->getInterfaces());
        $actual   = \array_keys(self::$instance->getInterfaces());
        self::assertEquals($expected, $actual);
    }

    public function testIsCloneable()
    {
        $expected = self::$raw->isCloneable();
        $actual   = self::$instance->isCloneable();
        self::assertSame($expected, $actual);
    }

    public function testGetProperties()
    {
        $filter   = \ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PRIVATE;
        $expected = self::$raw->getProperties($filter);
        $actual   = self::$instance->getProperties($filter);
        self::assertEquals($expected, $actual);
    }

    public function testNewInstanceWithoutConstructor()
    {
        $expected = new \stdClass();
        $actual   = (new ReflectionClass(\stdClass::class))->newInstanceWithoutConstructor();
        self::assertEquals($expected, $actual);
    }

    public function testGetParentClass()
    {
        $expected = self::$raw->getParentClass()->getNamespaceName();
        $actual   = self::$instance->getParentClass()->getNamespaceName();
        self::assertSame($expected, $actual);

    }

    public function testGetInterfaceNames()
    {
        $expected = self::$raw->getInterfaceNames();
        $actual   = self::$instance->getInterfaceNames();
        self::assertSame($expected, $actual);
    }

    public function test__toString()
    {
        $expected = self::$raw->__toString();
        $actual   = self::$instance->__toString();
        self::assertSame($expected, $actual);
    }

    public function testGetModifiers()
    {
        $expected = self::$raw->getModifiers();
        $actual   = self::$instance->getModifiers();
        self::assertSame($expected, $actual);
    }

    public function testExport()
    {
        $expected = \substr_count(self::$raw::export(self::class, true), 'Method');
        $actual   = \substr_count(self::$instance::export(self::class), 'Method');
        self::assertSame($expected, $actual);
    }

    public function testGetDefaultProperties()
    {
        $expected = self::$raw->getDefaultProperties();
        $actual   = self::$instance->getDefaultProperties();
        self::assertSame($expected, $actual);
    }

    public function testGetProperty()
    {
        $expected = self::$raw->getProperty('fake');
        $actual   = self::$instance->getProperty('fake');
        self::assertEquals($expected, $actual);
    }

    public function testIsIterateable()
    {
        $expected = self::$raw->isIterable();
        $actual   = self::$instance->isIterable();
        self::assertSame($expected, $actual);
    }

    public function testIsInstantiable()
    {
        $expected = self::$raw->isInstantiable();
        $actual   = self::$instance->isInstantiable();
        self::assertSame($expected, $actual);
    }

    public function testGetTraitAliases()
    {
        $expected = self::$raw->getTraitAliases();
        $actual   = self::$instance->getTraitAliases();
        self::assertSame($expected, $actual);
    }

    public function testGetTraits()
    {
        $expected = self::$raw->getTraits();
        $actual   = self::$instance->getTraits();
        self::assertSame($expected, $actual);
    }

    public function testGetNamespaceName()
    {
        $expected = self::$raw->getNamespaceName();
        $actual   = self::$instance->getNamespaceName();
        self::assertSame($expected, $actual);
    }

    public function testGetMethod()
    {
        $expected = self::$raw->getMethod(__FUNCTION__);
        $actual   = self::$instance->getMethod(__FUNCTION__);
        self::assertEquals($expected, $actual);
    }

    public function testInNamespace()
    {
        $expected = self::$raw->inNamespace();
        $actual   = self::$instance->inNamespace();
        self::assertSame($expected, $actual);
    }

    public function testHasMethod()
    {
        $expected = self::$raw->hasMethod(__FUNCTION__);
        $actual   = self::$instance->hasMethod(__FUNCTION__);
        self::assertSame($expected, $actual);
    }

    public function testGetShortName()
    {
        $expected = self::$raw->getShortName();
        $actual   = self::$instance->getShortName();
        self::assertSame($expected, $actual);
    }

    public function testGetConstant()
    {
        $expected = self::$raw->getConstant('FAKE');
        $actual   = self::$instance->getConstant('FAKE');
        self::assertSame($expected, $actual);
    }

    public function testGetEndLine()
    {
        $expected = self::$raw->getEndLine();
        $actual   = self::$instance->getEndLine();
        self::assertSame($expected, $actual);
    }

    public function testIsAnonymous()
    {
        $expected = self::$raw->isAnonymous();
        $actual   = self::$instance->isAnonymous();
        self::assertSame($expected, $actual);
    }
}
