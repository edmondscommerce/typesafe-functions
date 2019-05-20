<?php declare(strict_types=1);


namespace ts\Tests\Small\Functions\FileFunctions;

use PHPUnit\Framework\TestCase;

/**
 * @small
 */
class GlobTest extends TestCase
{
    /**
     * @test
     */
    public function itCanGlobSomeFiles(): void
    {
        $result = \ts\glob(__DIR__ . '/*');
        self::assertGreaterThan(0, count($result));
    }

    /**
     * @test
     */
    public function itThrowsAnExceptionWhenGlobFails(): void
    {
        self::markTestSkipped('Can\'t figure out how to make glob fail');
        $pattern = 'http://www.edmondscommerce.co.uk';
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Failed getting glob for pattern: ' . $pattern);
        \ts\glob($pattern);
    }
}
