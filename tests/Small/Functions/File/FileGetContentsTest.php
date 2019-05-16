<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\File;

use PHPUnit\Framework\TestCase;

/**
 * Class file_get_contents
 *
 * @package \ts\Tests\Small
 * @covers  \ts\file_get_contents
 */
class FileGetContentsTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function itCanGetTheContentsOfAFile(): void
    {
        $contents = \ts\file_get_contents(__FILE__);
        self::assertContains(__FUNCTION__, $contents);
    }

    /**
     * @test
     * @small
     */
    public function itThrowsAnExceptionIfTheItCantGetTheContents(): void
    {
        $this->expectException(\RuntimeException::class);
        set_error_handler(function () {
            restore_error_handler();
        });
        \ts\file_get_contents('/path/does/not/exist');
    }
}
