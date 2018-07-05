<?php declare(strict_types=1);

namespace ts\Tests\Small\Reflection;

use PHPUnit\Framework\TestCase;
use ts\Reflection\ReflectionClass;

/**
 * Class ReflectionClassTest
 *
 * @package ts\Tests\Small\Reflection
 * @SuppressWarnings(PHPMD)
 */
class ReflectionClassTest extends TestCase
{
    private const FAKE = 'value';

    /**
     * @var string
     */
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
    public static function setUpBeforeClass(): void
    {
        self::$instance = new ReflectionClass(self::class);
        self::$raw      = new \ReflectionClass(self::class);
    }

    public function testGetExtensionName(): void
    {
        $expected = '';
        $actual   = self::$instance->getExtensionName();
        self::assertSame($expected, $actual);
    }

    public function testGetName(): void
    {
        $expected = self::class;
        $actual   = self::$instance->getName();
        self::assertSame($expected, $actual);
    }

    public function testIsInterface(): void
    {
        $expected = false;
        $actual   = self::$instance->isInterface();
        self::assertSame($expected, $actual);
    }

    public function testGetExtension(): void
    {
        $expected = self::$raw->getExtension();
        $actual   = self::$instance->getExtension();
        self::assertSame($expected, $actual);
    }

    public function testGetReflectionConstant(): void
    {
        $expected = self::$instance->getReflectionConstant('FAKE');
        $actual   = self::$instance->getReflectionConstant('FAKE');
        self::assertEquals($expected, $actual);
    }

    public function testGetStaticPropertyValue(): void
    {
        $expected = self::$raw->getStaticPropertyValue('fake');
        $actual   = self::$instance->getStaticPropertyValue('fake');
        self::assertEquals($expected, $actual);
    }

    public function testNewInstanceArgs(): void
    {
        $expected = new \SplFileInfo(__FILE__);
        $actual   = (new ReflectionClass(\SplFileInfo::class))->newInstanceArgs([__FILE__]);
        self::assertEquals($expected, $actual);
    }

    public function testIsUserDefined(): void
    {
        $expected = true;
        $actual   = self::$instance->isUserDefined();
        self::assertSame($expected, $actual);
    }

    public function testGetConstants(): void
    {
        $expected = ['FAKE' => self::FAKE];
        $actual   = self::$instance->getConstants();
        self::assertSame($expected, $actual);
    }

    public function testHasConstant(): void
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

    public function testIsFinal(): void
    {
        $expected = false;
        $actual   = self::$instance->isFinal();
        self::assertSame($expected, $actual);
    }

    public function testImplementsInterface(): void
    {
        $expected = false;
        $actual   = self::$instance->implementsInterface(\Iterator::class);
        self::assertSame($expected, $actual);
    }

    public function testIsSubclassOf(): void
    {
        $expected = false;
        $actual   = self::$instance->isSubclassOf(\IteratorIterator::class);
        self::assertSame($expected, $actual);
    }

    public function testGetFileName(): void
    {
        $expected = __FILE__;
        $actual   = self::$instance->getFileName();
        self::assertSame($expected, $actual);
    }

    public function testGetMethods(): void
    {
        $expected = self::$raw->getMethods();
        $actual   = self::$instance->getMethods();
        self::assertEquals($expected, $actual);

        $filter   = \ReflectionMethod::IS_PUBLIC;
        $expected = self::$raw->getMethods($filter);
        $actual   = self::$instance->getMethods($filter);
        self::assertEquals($expected, $actual);
    }

    public function testGetReflectionConstants(): void
    {
        $expected = self::$raw->getReflectionConstants();
        $actual   = self::$instance->getReflectionConstants();
        self::assertEquals($expected, $actual);
    }

    public function testGetStartLine(): void
    {
        $expected = self::$raw->getStartLine();
        $actual   = self::$instance->getStartLine();
        self::assertSame($expected, $actual);
    }

    public function testGetStaticProperties(): void
    {
        $expected = self::$raw->getStaticProperties();
        $actual   = self::$instance->getStaticProperties();
        self::assertSame($expected, $actual);
    }

    public function testSetStaticPropertyValue(): void
    {
        $expected = 'updated';
        self::$instance->setStaticPropertyValue('fake', $expected);
        self::assertSame($expected, self::$instance->getStaticPropertyValue('fake'));
        self::$instance->setStaticPropertyValue('fake', 'value');
    }

    public function testGetDocComment(): void
    {
        $expected = '';
        $actual   = self::$instance->getDocComment();
        self::assertSame($expected, $actual);
    }

    public function testNewInstance(): void
    {
        $expected = new \stdClass();
        $actual   = (new ReflectionClass(\stdClass::class))->newInstance();
        self::assertEquals($expected, $actual);
    }

    public function testIsInternal(): void
    {
        $expected = false;
        $actual   = self::$instance->isInternal();
        self::assertSame($expected, $actual);
    }

    public function testGetTraitNames(): void
    {
        $expected = self::$raw->getTraitNames();
        $actual   = self::$instance->getTraitNames();
        self::assertSame($expected, $actual);
    }

    public function testIsTrait(): void
    {
        $expected = false;
        $actual   = self::$instance->isTrait();
        self::assertSame($expected, $actual);
    }

    public function testIsInstance(): void
    {
        $object   = new \SplDoublyLinkedList();
        $expected = false;
        $actual   = self::$instance->isInstance($object);
        self::assertSame($expected, $actual);
    }

    public function testIsAbstract(): void
    {
        $expected = false;
        $actual   = self::$instance->isAbstract();
        self::assertSame($expected, $actual);
    }

    public function testIsIterable(): void
    {
        $expected = false;
        $actual   = self::$instance->isIterable();
        self::assertSame($expected, $actual);
    }

    public function testGetConstructor(): void
    {
        $expected = self::$raw->getConstructor();
        $actual   = self::$instance->getConstructor();
        self::assertEquals($expected, $actual);
    }

    public function testHasProperty(): void
    {
        $expected = false;
        $actual   = self::$instance->hasProperty('no');
        self::assertSame($expected, $actual);
    }

    public function testGetInterfaces(): void
    {
        $expected = \array_keys(self::$raw->getInterfaces());
        $actual   = \array_keys(self::$instance->getInterfaces());
        self::assertEquals($expected, $actual);
    }

    public function testIsCloneable(): void
    {
        $expected = self::$raw->isCloneable();
        $actual   = self::$instance->isCloneable();
        self::assertSame($expected, $actual);
    }

    public function testGetProperties(): void
    {
        $filter   = \ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PRIVATE;
        $expected = self::$raw->getProperties($filter);
        $actual   = self::$instance->getProperties($filter);
        self::assertEquals($expected, $actual);
    }

    public function testNewInstanceWithoutConstructor(): void
    {
        $expected = new \stdClass();
        $actual   = (new ReflectionClass(\stdClass::class))->newInstanceWithoutConstructor();
        self::assertEquals($expected, $actual);
    }

    public function testGetParentClass(): void
    {
        $expected            = null;
        $rawReflectionParent = self::$raw->getParentClass();
        if ($rawReflectionParent instanceof \ReflectionClass) {
            $expected = $rawReflectionParent->getNamespaceName();
        }
        $actual = self::$instance->getParentClass()->getNamespaceName();
        self::assertSame($expected, $actual);
    }

    public function testGetInterfaceNames(): void
    {
        $expected = self::$raw->getInterfaceNames();
        $actual   = self::$instance->getInterfaceNames();
        self::assertSame($expected, $actual);
    }

    public function test__toString(): void
    {
        $expected = self::$raw->__toString();
        $actual   = self::$instance->__toString();
        self::assertSame($expected, $actual);
    }

    public function testGetModifiers(): void
    {
        $expected = self::$raw->getModifiers();
        $actual   = self::$instance->getModifiers();
        self::assertSame($expected, $actual);
    }

    public function testExport(): void
    {
        $expected = \substr_count((string)self::$raw::export(self::class, true), 'Method');
        $actual   = \substr_count(self::$instance::export(self::class), 'Method');
        self::assertSame($expected, $actual);
    }

    public function testGetDefaultProperties(): void
    {
        $expected = self::$raw->getDefaultProperties();
        $actual   = self::$instance->getDefaultProperties();
        self::assertSame($expected, $actual);
    }

    public function testGetProperty(): void
    {
        $expected = self::$raw->getProperty('fake');
        $actual   = self::$instance->getProperty('fake');
        self::assertEquals($expected, $actual);
    }

    public function testIsIterateable(): void
    {
        $expected = self::$raw->isIterable();
        $actual   = self::$instance->isIterable();
        self::assertSame($expected, $actual);
    }

    public function testIsInstantiable(): void
    {
        $expected = self::$raw->isInstantiable();
        $actual   = self::$instance->isInstantiable();
        self::assertSame($expected, $actual);
    }

    public function testGetTraitAliases(): void
    {
        $expected = self::$raw->getTraitAliases();
        $actual   = self::$instance->getTraitAliases();
        self::assertSame($expected, $actual);
    }

    public function testGetTraits(): void
    {
        $expected = self::$raw->getTraits();
        $actual   = self::$instance->getTraits();
        self::assertSame($expected, $actual);
    }

    public function testGetNamespaceName(): void
    {
        $expected = self::$raw->getNamespaceName();
        $actual   = self::$instance->getNamespaceName();
        self::assertSame($expected, $actual);
    }

    public function testGetMethod(): void
    {
        $expected = self::$raw->getMethod(__FUNCTION__);
        $actual   = self::$instance->getMethod(__FUNCTION__);
        self::assertEquals($expected, $actual);
    }

    public function testInNamespace(): void
    {
        $expected = self::$raw->inNamespace();
        $actual   = self::$instance->inNamespace();
        self::assertSame($expected, $actual);
    }

    public function testHasMethod(): void
    {
        $expected = self::$raw->hasMethod(__FUNCTION__);
        $actual   = self::$instance->hasMethod(__FUNCTION__);
        self::assertSame($expected, $actual);
    }

    public function testGetShortName(): void
    {
        $expected = self::$raw->getShortName();
        $actual   = self::$instance->getShortName();
        self::assertSame($expected, $actual);
    }

    public function testGetConstant(): void
    {
        $expected = self::$raw->getConstant('FAKE');
        $actual   = self::$instance->getConstant('FAKE');
        self::assertSame($expected, $actual);
    }

    public function testGetEndLine(): void
    {
        $expected = self::$raw->getEndLine();
        $actual   = self::$instance->getEndLine();
        self::assertSame($expected, $actual);
    }

    public function testIsAnonymous(): void
    {
        $expected = self::$raw->isAnonymous();
        $actual   = self::$instance->isAnonymous();
        self::assertSame($expected, $actual);
    }
}
