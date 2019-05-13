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
    public function itCanChunkAnArrayInToMultipleValues(): void
    {
        $input = range(1, 10);

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
    public function itWillThrowAnExceptionWhenANullArrayIsReturned(): void
    {
		$this->expectException(\RuntimeException::class);
		$this->expectExceptionMessage('Array is empty in ts\array_chunk');
		
        $input = range(1, 9);

        @$actual = \ts\array_chunk($input, 0);
    }
}
