<?php

declare(strict_types=1);

namespace WonderWp\Component\Response\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WonderWp\Component\Response\AbstractResponse;
use WonderWp\Component\Response\ResponseInterface;

final class AbstractResponseTest extends TestCase
{
    public function testIsSuccessWhenCodeStartsWithTwo(): void
    {
        $response = new class (201, 'created') extends AbstractResponse {
        };
        $this->assertTrue($response->isSuccess());
        $this->assertSame(201, $response->getCode());
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testIsNotSuccessForErrorCodes(): void
    {
        $response = new class (500, 'error') extends AbstractResponse {
        };
        $this->assertFalse($response->isSuccess());
    }
}
