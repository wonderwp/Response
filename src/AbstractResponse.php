<?php

namespace WonderWp\Component\Response;

use JsonSerializable;
use WonderWp\Component\Response\Traits\SerializableResponse;

abstract class AbstractResponse implements ResponseInterface, JsonSerializable
{
    protected int $code;

    protected string $msgKey;

    protected string $textDomain;

    protected ?\Throwable $error = null;

    use SerializableResponse;

    public function __construct(int $code = 0, string $msgKey = '', string $textDomain = '')
    {
        $this->code = $code;
        $this->msgKey = $msgKey;
        $this->textDomain = $textDomain;
    }

    /** {@inheritDoc} */
    public function getCode(): int
    {
        return $this->code;
    }

    /** {@inheritDoc} */
    public function setCode(int $code): ResponseInterface
    {
        $this->code = $code;

        return $this;
    }

    /** {@inheritDoc} */
    public function getMsgKey(): string
    {
        return $this->msgKey;
    }

    /** {@inheritDoc} */
    public function setMsgKey(string $msgKey): ResponseInterface
    {
        $this->msgKey = $msgKey;

        return $this;
    }

    /** {@inheritDoc} */
    public function setTextDomain(string $textDomain): static
    {
        $this->textDomain = $textDomain;

        return $this;
    }

    /** {@inheritDoc} */
    public function getTextDomain(): string
    {
        return $this->textDomain;
    }

    /** {@inheritDoc} */
    public function isSuccess(): bool
    {
        //Check if the code starts with 2
        return str_starts_with((string) $this->code, '2');
    }

    /** {@inheritDoc} */
    public function getError(): ?\Throwable
    {
        return $this->error;
    }

    /** {@inheritDoc} */
    public function setError(?\Throwable $error): ResponseInterface
    {
        $this->error = $error;

        return $this;
    }
}
