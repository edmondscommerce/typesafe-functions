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
     * @param object $object
     * @param mixed  ...$parameters
     *
     * @return mixed
     */
    public function invoke(object $object, ...$parameters)
    {
        return $this->reflectionMethod->invoke($object, ...$parameters);
    }

    /**
     * @param object $object
     * @param array  $args
     *
     * @return mixed
     */
    public function invokeArgs(object $object, array $args)
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

}