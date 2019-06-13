<?php declare(strict_types=1);


namespace ts\Tests\Small\Functions\PregFunctions;

use PHPUnit\Framework\TestCase;

/**
 * @small
 * @covers \ts\preg_replace
 */
class PregReplaceTest extends TestCase
{


    /**
     * @test
     */
    public function itCanReplaceSimpleTextSuccessfully(): void
    {
        $subject = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
        $pattern = '%\s+|\W+%';
        $replacement = '';

        $expected = 'Loremipsumdolorsitametconsecteturadipiscingelit';
        $actual = \ts\preg_replace($pattern, $replacement, $subject);

        self::assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function itAttemptsAndReturnsUnknownError(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('An unknown error occurred in ts\preg_replace');

        $pattern = '%\[\](\s|.)*\]%s';
        $replacement = '';
        $subject = hex2bin('5b5d202073205b0d0a0d0a0d0a0d0a20202020202020203a');
        $subject = (string)$subject;

        \ts\preg_replace($pattern, $replacement, $subject);
    }

}
