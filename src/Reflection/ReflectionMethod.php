<?php declare(strict_types=1);

namespace ts\Reflection;

class ReflectionMethod
{
    use SelfReflectionTrait;

    /**
     * @var \ReflectionMethod
     */
    private $reflectionMethod;

    /**
     * @param string|object $class
     * @param string        $name
     *
     * @throws \ReflectionException
     */
    public function __construct($class, string $name)
    {
        $this->reflectionMethod = new \ReflectionMethod($class, $name);
    }

    /**
     * Exports
     *
     * @link  https://php.net/manual/en/reflector.export.php
     * @return string
     * @since 5.0
     */
    public static function export()
    {
        throw new \RuntimeException('Unsupported method ' . __METHOD__);
    }

    public function isPublic(): bool
    {
        return $this->reflectionMethod->isPublic();
    }

    public function isPrivate(): bool
    {
        return $this->reflectionMethod->isPrivate();
    }

    public function isProtected(): bool
    {
        return $this->reflectionMethod->isProtected();
    }

    public function isAbstract(): bool
    {
        return $this->reflectionMethod->isAbstract();
    }

    public function isFinal(): bool
    {
        return $this->reflectionMethod->isFinal();
    }

    public function isStatic(): bool
    {
        return $this->reflectionMethod->isStatic();
    }

    public function isConstructor(): bool
    {
        return $this->reflectionMethod->isConstructor();
    }

    public function getClosure(object $object = null): \Closure
    {
        $result = $this->reflectionMethod->getClosure($object);
        if (null === $result) {
            throw new \RuntimeException('Unexpeted error in ' . __METHOD__);
        }

        return $result;
    }

    /**
     * @param object|null $object
     * @param mixed       ...$parameters
     *
     * @return mixed
     */
    public function invoke(?object $object = null, ...$parameters)
    {
        return $this->reflectionMethod->invoke($object, ...$parameters);
    }

    /**
     * @param object|null $object
     * @param array       $args
     *
     * @return mixed
     */
    public function invokeArgs(?object $object, array $args)
    {
        return $this->reflectionMethod->invokeArgs($object, $args);
    }

    public function getPrototype(): self
    {
        $reflectionMethod = $this->reflectionMethod->getPrototype();

        return self::constructFromReflectionMethod($reflectionMethod);
    }

    /**
     * For when we need to return instances of self from an existing instance of \ReflectionClass
     *
     * @param \ReflectionMethod $reflectionMethod
     *
     * @return self
     * @throws \ReflectionException
     */
    public static function constructFromReflectionMethod(\ReflectionMethod $reflectionMethod): self
    {
        /**
         * @var self $instance
         */
        $instance                   = self::getSelfReflection()->newInstanceWithoutConstructor();
        $instance->reflectionMethod = $reflectionMethod;

        return $instance;
    }

    public function setAccessible(bool $accessible): void
    {
        $this->reflectionMethod->setAccessible($accessible);
    }

    public function inNamespace(): bool
    {
        return $this->reflectionMethod->inNamespace();
    }

    public function isClosure(): bool
    {
        return $this->reflectionMethod->isClosure();
    }

    public function isDeprecated(): bool
    {
        return $this->reflectionMethod->isDeprecated();
    }

    public function isInternal(): bool
    {
        return $this->reflectionMethod->isInternal();
    }

    public function isUserDefined(): bool
    {
        return $this->reflectionMethod->isUserDefined();
    }

    public function getClosureThis(): object
    {
        return $this->reflectionMethod->getClosureThis();
    }

    public function getClosureScopeClass(): ReflectionClass
    {
        $result = $this->reflectionMethod->getClosureScopeClass();
        if (null === $result) {
            throw new \RuntimeException('Unexpected error in ' . __METHOD__);
        }

        return ReflectionClass::constructFromReflectionClass($result);
    }

    public function getDocComment(): ?string
    {
        return $this->reflectionMethod->getDocComment() ?: null;
    }

    public function getEndLine(): int
    {
        $result = $this->reflectionMethod->getEndLine();
        if (false === $result) {
            throw new \RuntimeException('Unexpected error in ' . __METHOD__);
        }

        return $result;
    }

    public function getExtension(): \ReflectionExtension
    {
        return $this->reflectionMethod->getExtension();
    }

    public function getExtensionName(): string
    {
        return $this->reflectionMethod->getExtensionName();
    }

    public function getFileName(): string
    {
        $result = $this->reflectionMethod->getFileName();
        if (false === $result) {
            throw new \RuntimeException('Unexpected error in ' . __METHOD__);
        }

        return $result;
    }

    public function getName(): string
    {
        return $this->reflectionMethod->getName();
    }

    public function getNamespaceName(): string
    {
        return $this->reflectionMethod->getNamespaceName();
    }

    public function getNumberOfParameters(): int
    {
        return $this->reflectionMethod->getNumberOfParameters();
    }

    public function getNumberOfRequiredParameters(): int
    {
        return $this->reflectionMethod->getNumberOfRequiredParameters();
    }

    public function getParameters(): array
    {
        return $this->reflectionMethod->getParameters();
    }

    public function getReturnType(): ?\ReflectionType
    {
        return $this->reflectionMethod->getReturnType();
    }

    public function getShortName(): string
    {
        return $this->reflectionMethod->getShortName();
    }

    public function getStartLine(): int
    {
        $result = $this->reflectionMethod->getStartLine();
        if (false === $result) {
            throw new \RuntimeException('Unexpected error in ' . __METHOD__);
        }

        return $result;
    }

    public function getStaticVariables(): array
    {
        return $this->reflectionMethod->getStaticVariables();
    }

    public function hasReturnType(): bool
    {
        return $this->reflectionMethod->hasReturnType();
    }

    public function returnsReference(): bool
    {
        return $this->reflectionMethod->returnsReference();
    }

    public function isGenerator(): bool
    {
        return $this->reflectionMethod->isGenerator();
    }

    public function isVariadic(): bool
    {
        return $this->reflectionMethod->isVariadic();
    }

    /**
     * To string
     *
     * @link  https://php.net/manual/en/reflectionfunctionabstract.tostring.php
     * @since 5.0
     */
    public function __toString()
    {
        return $this->reflectionMethod->__toString();
    }
}
