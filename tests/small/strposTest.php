<?php declare(strict_types=1);

namespace ts\tests\small;

use PHPUnit\Framework\TestCase;

/**
 * Class file_get_contents
 *
 * @package \ts\tests\small
 * @covers  \ts\strpos
 */
class strposTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itCanGetTheStringPosition(): void
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
    public function itThrowsAnExceptionIfItFailsToFind(): void
    {
        $this->expectException(\RuntimeException::class);
        \ts\strpos('nothere', 'needle');
    }
}
