<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\ArrayFunctions;

use PHPUnit\Framework\TestCase;

/**
 * @small
 */
class ArrayChunkTest extends TestCase
{
    /**
     * @test
     */
    public function itCanChunkAnArrayInToMultipleValuesWithoutPreservingTheKeys(): void
    {
        $numbers = range(1, 10);
        $letters = str_split('abcdefghij');

        $input = \ts\array_combine($letters, $numbers);

        $expected = [[1, 2], [3, 4], [5, 6], [7, 8], [9, 10]];

        $actual = \ts\array_chunk($input, 2);

        foreach ($actual as $item) {
            self::assertCount(2, $item);
        }

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function itCanChunkAnArrayInToMultipleValuesWithAnNonMatchingFinalChunk(): void
    {
        $input = range(1, 9);

        $expected = [[1, 2], [3, 4], [5, 6], [7, 8], [9]];

        $actual = \ts\array_chunk($input, 2);

        self::assertSame($expected, $actual);

        $finalChunk = array_pop($actual);

        self::assertCount(1, $finalChunk);

        foreach ($actual as $item) {
            self::assertCount(2, $item);
        }
    }

    /**
     * @test
     */
    public function itCanChunkAnArrayInToMultipleValuesAndPreserveTheKeys(): void
    {
        $numbers = range(1, 10);
        $letters = str_split('abcdefghij');

        $input = \ts\array_combine($letters, $numbers);

        $expected = [['a' => 1, 'b' => 2], ['c' => 3, 'd' => 4], ['e' => 5, 'f' => 6], ['g' => 7, 'h' => 8], ['i' => 9, 'j' => 10]];

        $actual = \ts\array_chunk($input, 2, true);

        foreach ($actual as $item) {
            self::assertCount(2, $item);
        }

        self::assertSame($expected, $actual);
    }
}
