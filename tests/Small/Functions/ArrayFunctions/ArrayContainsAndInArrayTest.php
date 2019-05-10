<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\ArrayFunctions;

use PHPUnit\Framework\TestCase;

/**
 * @small
 */
class ArrayContainsAndInArrayTest extends TestCase
{
    /**
     * @test
     */
    public function arrayContainsFindsElementsThatAreStrictlyEqual(): void
    {
        $haystack = [
            1,
            2.0,
            3,
        ];
        $needle   = 2.0;
        self::assertTrue(\ts\arrayContains($needle, $haystack));
    }

    /**
     * @test
     */
    public function arrayContainsDoesNotFindElementsThatAreNotStrictlyEqual(): void
    {
        $haystack = [
            1,
            2.0,
            3,
        ];
        $needle   = 2;
        self::assertFalse(\ts\arrayContains($needle, $haystack));
    }

    /**
     * @test
     */
    public function inArrayFindsElementsThatAreStrictlyEqual(): void
    {
        $haystack = [
            1,
            2.0,
            3,
        ];
        $needle   = 2.0;
        self::assertTrue(\ts\in_array($needle, $haystack));
    }

    /**
     * @test
     */
    public function inArrayDoesNotFindElementsThatAreNotStrictlyEqual(): void
    {
        $haystack = [
            1,
            2.0,
            3,
        ];
        $needle   = 2;
        self::assertFalse(\ts\in_array($needle, $haystack));
    }

    /**
     * @test
     */
    public function arrayContainsDoesNotFindNestedElementsThatAreStrictlyEqual(): void
    {
        $haystack = [
            1,
            2.0,
            [
                2,
            ],
            3,
        ];
        $needle   = 2;
        self::assertFalse(\ts\arrayContains($needle, $haystack));
    }

    /**
     * @test
     */
    public function inArrayDoesNotFindNestedElementsThatAreStrictlyEqual(): void
    {
        $haystack = [
            1,
            2.0,
            [
                2,
            ],
            3,
        ];
        $needle   = 2;
        self::assertFalse(\ts\in_array($needle, $haystack));
    }

}
