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
    public function itFindsElementsThatAreStrictlyEqual(): void
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
    public function itDoesNotFindElementsThatAreNotStrictlyEqual(): void
    {
        $haystack = [
            1,
            2.0,
            3,
        ];
        $needle   = 2;
        self::assertFalse(\ts\arrayContains($needle, $haystack));
    }
}
