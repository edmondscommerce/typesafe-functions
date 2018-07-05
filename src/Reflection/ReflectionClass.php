<?php declare(strict_types=1);

namespace ts\Reflection;

/**
 * @SuppressWarnings(PHPMD)
 */
class ReflectionClass
{
    /**
     * @var \ReflectionClass
     */
    private $reflectionClass;

    /**
     * @var \ReflectionClass
     */
    private static $selfReflection;

    /**
     * ReflectionClass constructor.
     *
     * @param string $fqn
     *
     * @throws \ReflectionException
     */
    public function __construct(string $fqn)
    {
        $this->reflectionClass = new \ReflectionClass($fqn);
    }

    /**
     * @return \ReflectionClass
     * @throws \ReflectionException
     */
    private function getSelfReflection(): \ReflectionClass
    {
        if (null === self::$selfReflection) {
            self::$selfReflection = new \ReflectionClass(self::class);
        }

        return self::$selfReflection;
    }

    /**
     * For when we need to return instances of self from an existing instance of \ReflectionClass
     *
     * @param \ReflectionClass $reflectionClass
     *
     * @return self
     * @throws \ReflectionException
     */
    private function constructFromReflectionClass(\ReflectionClass $reflectionClass): self
    {
        /**
         * @var self $instance
         */
        $instance                  = $this->getSelfReflection()->newInstanceWithoutConstructor();
        $instance->reflectionClass = $reflectionClass;

        return $instance;
    }

    /**
     * Take an array of raw \ReflectionClass objects and return an array of self
     *
     * @param array $reflectionClasses
     *
     * @return array|self[]
     * @throws \ReflectionException
     */
    private function convertArrayOfReflectionToSelf(array $reflectionClasses): array
    {
        $return = [];
        foreach ($reflectionClasses as $key => $reflectionClass) {
            $return[$key] = $this->constructFromReflectionClass($reflectionClass);
        }

        return $return;
    }

    /**
     * @param string $fqn
     *
     * @return string
     */
    public static function export(string $fqn): string
    {
        return (string)\ReflectionClass::export($fqn, true);
    }

    public function __toString(): string
    {
        return $this->reflectionClass->__toString();
    }

    public function getName(): string
    {
        return $this->reflectionClass->getName();
    }

    public function isInternal(): bool
    {
        return $this->reflectionClass->isInternal();
    }

    public function isUserDefined(): bool
    {
        return $this->reflectionClass->isUserDefined();
    }

    public function isInstantiable(): bool
    {
        return $this->reflectionClass->isInstantiable();
    }

    public function isCloneable(): bool
    {
        return $this->reflectionClass->isCloneable();
    }

    public function getFileName(): string
    {
        $filename = $this->reflectionClass->getFileName();
        if (false === $filename) {
            throw new \RuntimeException('the reflection class does not have a filename');
        }

        return $filename;
    }

    public function getStartLine(): int
    {
        return $this->reflectionClass->getStartLine();
    }

    public function getEndLine(): int
    {
        return $this->reflectionClass->getEndLine();
    }

    public function getDocComment(): string
    {
        return (string)$this->reflectionClass->getDocComment();
    }

    public function getConstructor(): ?\ReflectionMethod
    {
        return $this->reflectionClass->getConstructor();
    }

    public function hasMethod(string $name): bool
    {
        return $this->reflectionClass->hasMethod($name);
    }

    public function getMethod(string $name): \ReflectionMethod
    {
        return $this->reflectionClass->getMethod($name);
    }

    public function getMethods(?int $filter = null): array
    {
        if (null === $filter) {
            return $this->reflectionClass->getMethods();
        }

        return $this->reflectionClass->getMethods($filter);
    }

    public function hasProperty(string $name): bool
    {
        return $this->reflectionClass->hasProperty($name);
    }

    public function getProperty(string $name): \ReflectionProperty
    {
        return $this->reflectionClass->getProperty($name);
    }

    /**
     * @param int|null $filter
     *
     * @return array|\ReflectionProperty[]
     */
    public function getProperties(?int $filter = null): array
    {
        return (null === $filter) ?
            $this->reflectionClass->getProperties()
            : $this->reflectionClass->getProperties($filter);
    }

    public function getReflectionConstant(string $name): \ReflectionClassConstant
    {
        return $this->reflectionClass->getReflectionConstant($name);
    }

    /**
     * @return array|\ReflectionClassConstant[]
     */
    public function getReflectionConstants(): array
    {
        return $this->reflectionClass->getReflectionConstants();
    }

    public function hasConstant(string $name): bool
    {
        return $this->reflectionClass->hasConstant($name);
    }

    /**
     * @return array|string[]
     */
    public function getConstants(): array
    {
        return $this->reflectionClass->getConstants();
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getConstant(string $name)
    {
        return $this->reflectionClass->getConstant($name);
    }

    /**
     * @return array|self[]
     * @throws \ReflectionException
     */
    public function getInterfaces(): array
    {
        return $this->convertArrayOfReflectionToSelf($this->reflectionClass->getInterfaces());
    }

    /**
     * @return array|string[]
     */
    public function getInterfaceNames(): array
    {
        return $this->reflectionClass->getInterfaceNames();
    }

    public function isAnonymous(): bool
    {
        return $this->reflectionClass->isAnonymous();
    }

    public function isInterface(): bool
    {
        return $this->reflectionClass->isInterface();
    }

    /**
     * @return array|self[]
     * @throws \ReflectionException
     */
    public function getTraits(): array
    {
        return $this->convertArrayOfReflectionToSelf($this->reflectionClass->getTraits());
    }

    /**
     * @return array|string[]
     */
    public function getTraitNames(): array
    {
        return $this->reflectionClass->getTraitNames();
    }

    public function getTraitAliases(): array
    {
        return $this->reflectionClass->getTraitAliases();
    }

    public function isTrait(): bool
    {
        return $this->reflectionClass->isTrait();
    }

    public function isAbstract(): bool
    {
        return $this->reflectionClass->isAbstract();
    }

    public function isFinal(): bool
    {
        return $this->reflectionClass->isFinal();
    }

    public function getModifiers(): int
    {
        return $this->reflectionClass->getModifiers();
    }

    /**
     * @param mixed $object
     *
     * @return bool
     */
    public function isInstance($object): bool
    {
        return $this->reflectionClass->isInstance($object);
    }

    /**
     * @param mixed ...$args
     *
     * @return object
     */
    public function newInstance(...$args)
    {
        return $this->reflectionClass->newInstance(...$args);
    }

    /**
     * @return object
     */
    public function newInstanceWithoutConstructor()
    {
        return $this->reflectionClass->newInstanceWithoutConstructor();
    }

    /**
     * @param array|null $args
     *
     * @return object
     */
    public function newInstanceArgs(array $args = null)
    {
        return $this->reflectionClass->newInstanceArgs($args ?? []);
    }

    /**
     * @return self
     * @throws \ReflectionException
     */
    public function getParentClass(): self
    {
        $parent = $this->reflectionClass->getParentClass();
        if (false === $parent) {
            throw new \RuntimeException('reflection class does not have a parent');
        }

        return $this->constructFromReflectionClass($parent);
    }

    public function isSubclassOf(string $class): bool
    {
        return $this->reflectionClass->isSubclassOf($class);
    }

    public function getStaticProperties(): array
    {
        return $this->reflectionClass->getStaticProperties();
    }

    /**
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getStaticPropertyValue(string $name, $default = null)
    {
        return $this->reflectionClass->getStaticPropertyValue($name, $default);
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function setStaticPropertyValue(string $name, $value): void
    {
        $this->reflectionClass->setStaticPropertyValue($name, $value);
    }

    public function getDefaultProperties(): array
    {
        return $this->reflectionClass->getDefaultProperties();
    }

    public function isIterateable(): bool
    {
        return $this->reflectionClass->isIterateable();
    }

    public function isIterable(): bool
    {
        return $this->reflectionClass->isIterable();
    }

    public function implementsInterface(string $interface): bool
    {
        return $this->reflectionClass->implementsInterface($interface);
    }

    public function getExtension(): ?\ReflectionExtension
    {
        return $this->reflectionClass->getExtension();
    }

    public function getExtensionName(): string
    {
        return (string)$this->reflectionClass->getExtensionName();
    }

    public function inNamespace(): bool
    {
        return $this->reflectionClass->inNamespace();
    }

    public function getNamespaceName(): string
    {
        return $this->reflectionClass->getNamespaceName();
    }

    public function getShortName(): string
    {
        return $this->reflectionClass->getShortName();
    }
}
