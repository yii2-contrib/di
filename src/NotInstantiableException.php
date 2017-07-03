<?php

namespace fuwu\common\di;

use fuwu\common\base\InvalidConfigException;
use Throwable;

class NotInstantiableException extends InvalidConfigException
{
    public function __construct($class, $message = null, $code = 0, \Exception $previous = null)
    {
        if ($message === null) {
            $message = "Can not instantiate $class.";
        }
        
        parent::__construct($message, $code, $previous);
    }
}
