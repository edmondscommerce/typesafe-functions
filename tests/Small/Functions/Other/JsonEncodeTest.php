<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\Other;

use PHPUnit\Framework\TestCase;

/**
 * @package ts\Tests\Small
 * @covers  \ts\ini_get
 */
class JsonEncodeTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function jsonEncodeReturnsAValidString(): void
    {
        $encode = static function () {
            return '22';
        };
        var_dump(\ts\json_encode($encode));
        self::assertIsString(\ts\json_encode($encode));
    }

    /**
     * @test
     * @small
     */
    public function jsonEncodePassInClassWithPublicPropertiesAndReceiveValues(): void
    {
        $encode = new class{
            public $test = '123';
        };
        $result = \ts\json_encode($encode);
        self::assertStringContainsString('{"test":"123"}', $result);
    }

    /**
     * @test
     * @small
     */
    public function jsonEncodePassInClassWithPrivateAndProtectedPropertiesAndReceiveNoValues(): void
    {
        $encode = new class{
            protected $test = '123';
            protected $test2 = '1234';
        };
        $result = \ts\json_encode($encode);
        self::assertStringContainsString('{}', $result);
    }

    /**
     * @test
     * @small
     */
    public function jsonEncodePassInClosureAndReceiveNoValues(): void
    {
        $encode = static function(){
            return ['test' => 123];
        };
        $result = \ts\json_encode($encode);
        self::assertStringContainsString('{}', $result);
    }
    
    /**
     * @test
     * @small
     */
    public function jsonEncodePassInResourceAndReceiveRuntimeError(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('An error occurred in ts\json_encode Type is not supported');
        $encode = curl_init();
        \ts\json_encode($encode);
    }
}
