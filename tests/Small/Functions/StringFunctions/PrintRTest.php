<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\StringFunctions;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ts\print_r
 */
class PrintRTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itReturnsAStringWhenPassedAnArray(): void
    {
        $mixed  = [
            0 => '123',
            1.2,
        ];
        $actual = \ts\print_r($mixed, true);
        self::assertInternalType('string', $actual);
    }

    /**
     * @test
     * @small
     */
    public function itReturnsAStringWhenPassedAFloat(): void
    {
        $mixed  = 1.234;
        $actual = \ts\print_r($mixed, true);
        self::assertInternalType('string', $actual);
    }
}
