<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\ArrayFunctions;

use PHPUnit\Framework\TestCase;

/**
 * @small
 * @covers \ts\array_combine
 */
class ArrayCombineTest extends TestCase
{
    /**
     * @test
     */
    public function itCombinesTwoArrays(): void
    {
        $array1 = ['a', 'b', 'c'];
        $array2 = ['3', '4', '5'];

        $expected = ['a' => '3', 'b' => '4', 'c' => '5'];
        $actual = \ts\array_combine($array1, $array2);

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function itDoesNotCombineDifferentLengthArrays(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("The number of keys");

        $array1 = ['a', 'b', 'c'];
        $array2 = ['3', '4', '5', '6'];

        @\ts\array_combine($array1, $array2);
    }
}
