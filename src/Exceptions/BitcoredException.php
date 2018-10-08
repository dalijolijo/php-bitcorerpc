<?php

namespace Dali\Bitcore\Exceptions;

use RuntimeException;

class BitcoredException extends RuntimeException
{
    /**
     * Constructs new bitcored exception.
     *
     * @param object $error
     *
     * @return void
     */
    public function __construct($error)
    {
        parent::__construct($error['message'], $error['code']);
    }
}
