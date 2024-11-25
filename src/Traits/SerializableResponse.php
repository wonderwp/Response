<?php

namespace WonderWp\Component\Response\Traits;

trait SerializableResponse
{
    /** {@inheritDoc} */
    public function jsonSerialize(): mixed
    {
        $jsonSerialized = get_object_vars($this);
        if (!empty($jsonSerialized['msgKey'])) {
            $jsonSerialized['message'] = $this->getMessage();
            unset($jsonSerialized['msgKey']);
        }

        if (!empty($jsonSerialized['error']) && $jsonSerialized['error'] instanceof \Throwable) {
            $jsonSerialized['error'] = [
                'message' => $jsonSerialized['error']->getMessage(),
                'code' => $jsonSerialized['error']->getCode(),
                'file' => $jsonSerialized['error']->getFile(),
                'line' => $jsonSerialized['error']->getLine(),
            ];
        }

        return $jsonSerialized;
    }

    /** {@inheritDoc} */
    public function getMessage(): array
    {
        $message = [];
        $jsonSerialized = get_object_vars($this);
        if (!empty($jsonSerialized['msgKey'])) {
            $message = [
                'key' => $jsonSerialized['msgKey'],
                'domain' => 'ff-checkout',
                'translated' => __($jsonSerialized['msgKey'], $this->textDomain),
            ];
            unset($jsonSerialized['msgKey']);
        }

        return $message;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this);
    }

    /**
     * @return mixed
     */
    public function toArray()
    {
        return json_decode(json_encode($this), true);
    }

    public function toRequestBody()
    {
        return $this->toArray();
    }
}
