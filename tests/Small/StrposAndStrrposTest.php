<?php declare(strict_types=1);

namespace ts\Tests\Small;

use PHPUnit\Framework\TestCase;

/**
 * Class file_get_contents
 *
 * @package \ts\Tests\Small
 * @covers  \ts\strpos
 */
class StrposAndStrrposTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function strposCanGetTheStringPosition(): void
    {
        $needle   = 'needle';
        $haystack = 'haystack_needle_haystack';
        $expected = 9;
        $actual   = \ts\strpos($haystack, $needle);
        self::assertSame($expected, $actual);
    }
    /**
     * @test
     * @small
     */
    public function strposThrowsAnExceptionIfItFailsToFind(): void
    {
        $this->expectException(\RuntimeException::class);
        \ts\strpos('nothere', 'needle');
    }

    /**
     * @test
     * @small
     */
    public function strrposCanGetTheStringPosition(): void
    {
        $needle   = 'needle';
        $haystack = 'haystack_needle_haystack';
        $expected = 9;
        $actual   = \ts\strrpos($haystack, $needle);
        self::assertSame($expected, $actual);
    }
    /**
     * @test
     * @small
     */
    public function strrposThrowsAnExceptionIfItFailsToFind(): void
    {
        $this->expectException(\RuntimeException::class);
        \ts\strrpos('nothere', 'needle');
    }
}
