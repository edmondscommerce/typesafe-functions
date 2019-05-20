<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\ArrayFunctions;

use PHPUnit\Framework\TestCase;

/**
 * @small
 */
class ArraySliceTest extends TestCase
{
    /**
     * @test
     */
    public function itSlicesArrayOffset(): void
    {
        $array = ['a', 'b', 'c', 'd', 'e', 'f'];

        $expected = ['b', 'c', 'd', 'e', 'f'];
        $actual   = \ts\array_slice($array, 1);

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function itSlicesArrayOffsetLength(): void
    {
        $array = ['a', 'b', 'c', 'd', 'e', 'f'];

        $expected = ['b', 'c'];
        $actual   = \ts\array_slice($array, 1, 2);

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function itSlicesArrayOffsetLengthPreserve(): void
    {
        $array = ['a', 'b', 'c', 'd', 'e', 'f'];

        $expected = ['1' => 'b', '2' => 'c'];//, 'd', 'e', 'f'];
        $actual   = \ts\array_slice($array, 1, 2, true);

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function itSlicesArrayOffsetLengthPreserveOff(): void
    {
        $array = ['a', 'b', 'c', 'd', 'e', 'f'];

        $expected = ['0' => 'b', '1' => 'c'];//, 'd', 'e', 'f'];
        $actual   = \ts\array_slice($array, 1, 2, false);

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function itDoesNotCombineDifferentLengthArrays(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Slice is empty in");

        $array = ['a', 'b', 'c', 'd', 'e', 'f'];

        @\ts\array_slice($array, 1, 0);
    }
}
