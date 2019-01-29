<?php declare(strict_types=1);

namespace ts\Reflection;

trait SelfReflectionTrait
{
    /**
     * @var \ReflectionClass
     */
    private static $selfReflection;

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
}