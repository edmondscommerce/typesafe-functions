<?php

declare(strict_types=1);

namespace ts\Tests\Small;

use PHPUnit\Framework\TestCase;
use RuntimeException;

/**
 * @package \ts\Tests\Small
 * @covers  \ts\strototime
 */
class StrtotimeTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itWillReturnTheCorrectTimeAsInt(): void
    {
        $input = 'January 1st 1970 00:00';

        self::assertEquals(0, \ts\strtotime($input));
    }

    /**
     * @test
     * @small
     */
    public function itWillThrowAnExceptionOnFailure(): void
    {
        $input = 'Coconut';

        $this->expectException(RuntimeException::class);

        \ts\strtotime($input);
    }

}
