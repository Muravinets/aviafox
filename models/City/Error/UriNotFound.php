<?php
namespace City\Error;

require_once __DIR__ . '/../Error.php';
use City\Error;
use Throwable;

/**
 * Class UriNotFound
 * @package City\Error
 * @author Igor Muravinets
 */
class UriNotFound extends Error
{
    /**
     * UriNotFound constructor.
     * @param string $uri
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($uri, $code = 0, Throwable $previous = null)
    {
        $message = 'City URI ' . $uri . ' not found.';
        parent::__construct($message, $code, $previous);
    }
}