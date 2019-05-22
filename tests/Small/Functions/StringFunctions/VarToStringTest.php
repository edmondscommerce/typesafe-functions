<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\StringFunctions;

use PHPUnit\Framework\TestCase;

/**
 * Class varToStringTest
 *
 * @package ts\Tests\Small
 * @covers  \ts\varToString
 */
class VarToStringTest extends TestCase
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
