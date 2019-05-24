<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\StringFunctions;

use PHPUnit\Framework\TestCase;

/**
 * Class file_get_contents
 *
 * @package \ts\Tests\Small
 * @covers  \ts\stringContains
 */
class StringContainsTest extends TestCase
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

    /**
     * @test
     * @small
     */
    public function itCanConfirmStringIsNotFoundCaseSensitive(): void
    {
        $needle   = 'needle';
        $haystack = 'haystack_Needle_haystack';
        $expected = false;
        $actual   = \ts\stringContains($haystack, $needle, true);
        self::assertSame($expected, $actual);
    }
}
