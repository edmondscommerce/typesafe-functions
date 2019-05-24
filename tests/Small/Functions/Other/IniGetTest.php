<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\Other;

use PHPUnit\Framework\TestCase;

/**
 * @package ts\Tests\Small
 * @covers \ts\ini_get
 */
class IniGetTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function initGetReturnsTrueOnCorrectVarname(): void
    {
        $expected = '8M';
        $result = \ts\ini_get('post_max_size');
        self::assertSame($result, $expected);
    }

    /**
     * @test
     * @small
     */
    public function initGetThrowsExceptionOnInvalidVariableName(): void
    {
        $variableName = 'failedVariableName';
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Failed getting ' . $variableName . ' in ts\ini_get');
        self::assertIsString(\ts\ini_get($variableName));
    }
}
