<?php declare(strict_types=1);

namespace ts\Tests\Small;

use PHPUnit\Framework\TestCase;

/**
 * Class file_get_contents
 *
 * @package \ts\Tests\Small
 * @covers  \ts\strpos
 */
class StrstrTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itCanGetNeedleFromHaystack(): void
    {
        $needle   = 'needle';
        $haystack = 'haystack_needle_haystack';

        $expected = 'needle_haystack';
        $actual   = \ts\strstr($haystack, $needle);

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     * @small
     */
    public function itCanGetBeforeNeedleFromHaystack(): void
    {
        $needle   = 'needle';
        $haystack = 'haystack_needle_haystack';

        $expected = 'haystack_';
        $actual   = \ts\strstr($haystack, $needle, true);

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     * @small
     */
    public function itThrowsAnExceptionIfItFailsToFindNeedle(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Failing finding needle");

        $needle   = 'hello';
        $haystack = 'haystack_needle_haystack';

        \ts\strstr($haystack, $needle);
    }

    /**
     * @test
     * @small
     */
    public function itThrowsAnExceptionIfItFailsToFindBeforeNeedle(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Failing finding string before needle");

        $needle   = 'hello';
        $haystack = 'haystack_needle_haystack';

        \ts\strstr($haystack, $needle, true);
    }
}
