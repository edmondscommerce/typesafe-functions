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
        self::assertIsString(\ts\ini_get('post_max_size'));
    }

    /**
     * @test
     * @small
     */
    public function initGetThrowsExceptionOnInvalidVarname(): void
    {
        $varname = 'failedVarname';
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Failed getting '.$varname.' in ts\ini_get');
        self::assertIsString(\ts\ini_get($varname));
    }
}
