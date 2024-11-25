<?php

namespace WonderWp\Component\Response;

use Throwable;

interface ResponseInterface
{
    public function getCode(): int;

    public function setCode(int $code): static;

    public function getMsgKey(): string;

    public function setMsgKey(string $msgKey): static;

    public function setTextDomain(string $textDomain): static;

    public function getTextDomain(): string;

    /**
     * Compute a message array from the msgKey
     *
     * @return array
     *               Return format :
     *               [
     *               'key' => $this->msgKey
     *               'domain' => 'plugin-text-domain',
     *               'translated' => 'translated message'
     *               ]
     */
    public function getMessage(): array;

    public function isSuccess(): bool;

    public function getError(): ?Throwable;

    public function setError(?Throwable $error): static;
}
