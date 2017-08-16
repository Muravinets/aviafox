<?php
namespace City\Error;

require_once __DIR__ . '/../Error.php';
use City\Error;
use Throwable;

class TitleNotFound extends Error
{
    /**
     * @param string $title
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($title, $code = 0, Throwable $previous = null)
    {
        $message = 'City title "' . $title . '" not found.';
        parent::__construct($message, $code, $previous);
    }
}