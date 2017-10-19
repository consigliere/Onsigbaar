<?php
/**
 * InvalidCredentialsException.php
 * Created by rn on 10/20/2017 1:37 AM.
 */

namespace App\Components\Onsigbaar\Exceptions;

use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class InvalidCredentialsException extends UnauthorizedHttpException
{
    public function __construct($message = null, \Exception $previous = null, $code = 0)
    {
        parent::__construct('', $message, $previous, $code);
    }
}