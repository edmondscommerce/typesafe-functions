<?php declare(strict_types=1);

namespace ts\tests\small;

use PHPUnit\Framework\TestCase;

/**
 * Class varToStringTest
 *
 * @package ts\tests\small
 * @covers  \ts\varToString
 */
class varToStringTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itPrintsVarsToString(): void
    {
        $var      = ['this' => 'that'];
        $expected = 'Array
(
    [this] => that
)
';
        $actual   = \ts\varToString($var);
        self::assertSame($expected, $actual);
    }
}
