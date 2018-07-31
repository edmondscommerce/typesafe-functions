<?php declare(strict_types=1);

namespace ts\tests\Small;

use PHPUnit\Framework\TestCase;

class InArrayTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itFindsElementsThatAreStrictlyEqual()
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
     * @small
     */
    public function itDoesNotFindElementsThatAreNotStrictlyEqual()
    {
        $haystack = [
            1,
            2.0,
            3,
        ];
        $needle   = 2;
        self::assertFalse(\ts\in_array($needle, $haystack));
    }
}
