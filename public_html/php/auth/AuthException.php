<?php

namespace User;

class AuthException extends \Exception
{
    public function __construct($message)
    {
        $code = 0;
        $this->message = $message;
        parent::__construct($message, $code);
    }
}
