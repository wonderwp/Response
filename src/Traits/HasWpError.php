<?php

namespace WonderWp\Component\Response\Traits;

trait HasWpError
{
    protected ?\WP_Error $wpError = null;

    public function getWpError(): ?\WP_Error
    {
        return $this->wpError;
    }

    public function setWpError(?\WP_Error $wpError): void
    {
        $this->wpError = $wpError;
    }
}
