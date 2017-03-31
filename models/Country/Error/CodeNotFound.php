<?php
namespace Country\Error;

require_once __DIR__ . '/../Error.php';
use Country\Error;
use Throwable;

/**
 * Class CodeNotFound
 * @package Country\Error
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
        $message = 'Country code ' . $objectCode . ' not found.';
        parent::__construct($message, $code, $previous);
    }
}