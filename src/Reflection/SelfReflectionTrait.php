<?php declare(strict_types=1);

namespace ts\Reflection;

trait SelfReflectionTrait
{
    /**
     * @var \ReflectionClass
     */
    private static $selfReflection;

    /**
     * @return \ReflectionClass
     * @throws \ReflectionException
     */
    private static function getSelfReflection(): \ReflectionClass
    {
        if (null === self::$selfReflection) {
            self::$selfReflection = new \ReflectionClass(self::class);
        }

        return self::$selfReflection;
    }
}
