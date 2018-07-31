<?php declare(strict_types=1);

namespace ts\Tests\Small;

use PHPUnit\Framework\TestCase;

class ArrayContainsTest extends TestCase
{
    /**
     * @test
     * @small
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
     * @small
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
