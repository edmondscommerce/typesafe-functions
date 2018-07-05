<?php declare(strict_types=1);

namespace ts\Tests\Small;

use PHPUnit\Framework\TestCase;

/**
 * Class file_get_contents
 *
 * @package \ts\Tests\Small
 * @covers  \ts\stringStartsWith
 */
class StringStartsWithTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itCanConfirmStringStartsWith(): void
    {
        $needle   = 'needle';
        $haystack = 'needle_blah_blah';
        $expected = true;
        $actual   = \ts\stringStartsWith($haystack, $needle);
        self::assertSame($expected, $actual);
    }

    /**
     * @test
     * @small
     */
    public function itCanConfirmStringDoesNotStartWith(): void
    {
        $needle   = 'needle';
        $haystack = 'notstartingneedle';
        $expected = false;
        $actual   = \ts\stringStartsWith($haystack, $needle);
        self::assertSame($expected, $actual);
    }
}
