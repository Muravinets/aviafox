<?php
namespace City\Error;

require_once __DIR__ . '/../Error.php';
use City\Error;
use Throwable;

/**
 * Class CodeNotFound
 * @package City\Error
 * @author Igor Muravinets
 */
class CodeNotFound extends Error
{
    /**
     * CodeNotFound constructor.
     * @param string $objectCode
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($objectCode, $code = 0, Throwable $previous = null)
    {
        $message = 'City code ' . $objectCode . ' not found.';
        parent::__construct($message, $code, $previous);
    }
}