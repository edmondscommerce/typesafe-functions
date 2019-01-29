<?php declare(strict_types=1);

namespace ts\Reflection;

class ReflectionMethod
{
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

    public function getClosure($object): \Closure
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
     * @param       $object
     * @param array $args
     *
     * @return mixed
     */
    public function invokeArgs(object $object, array $args)
    {
        return $this->reflectionMethod->invokeArgs($object, $args);
    }

    public function getPrototype()
    {
        return $this->reflectionMethod->getPrototype();
    }

    public function setAccessible($accessible)
    {
        return $this->reflectionMethod->setAccessible($accessible);
    }

}