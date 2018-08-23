<?php declare(strict_types=1);

namespace ts\Tests\Small;

use PHPUnit\Framework\TestCase;

/**
 * @covers  \ts\file_put_contents
 */
class FilePutContentsTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itCanPutTheContentsOfAFile(): void
    {
        $filename = __DIR__ . '/../../var/' . __FUNCTION__;
        $expected = __METHOD__;
        $result   = \ts\file_put_contents($filename, $expected);
        self::assertTrue($result);
        $actual = \ts\file_get_contents($filename);
        self::assertSame($expected, $actual);
    }

    /**
     * @test
     * @small
     */
    public function itThrowsAnExceptionIfTheItCantPutTheContents(): void
    {
        $this->expectException(\RuntimeException::class);
        set_error_handler(function () {
            restore_error_handler();
        });
        \ts\file_put_contents('/path/does/not/exist', 'string');
    }
}
