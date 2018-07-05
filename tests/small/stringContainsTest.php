<?php declare(strict_types=1);

namespace ts\Tests\small;

use PHPUnit\Framework\TestCase;

/**
 * Class file_get_contents
 *
 * @package \ts\Tests\small
 * @covers  \ts\stringContains
 */
class stringContainsTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itCanConfirmStringIsFound(): void
    {
        $needle   = 'needle';
        $haystack = 'haystack_needle_haystack';
        $expected = true;
        $actual   = \ts\stringContains($haystack, $needle);
        self::assertSame($expected, $actual);
    }

    /**
     * @test
     * @small
     */
    public function itCanConfirmStringIsNotFound(): void
    {
        $needle   = 'needle';
        $haystack = 'not_here';
        $expected = false;
        $actual   = \ts\stringContains($haystack, $needle);
        self::assertSame($expected, $actual);
    }
}
