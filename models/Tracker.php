<?php

/**
 * Track traffic by Campaigns
 * Singleton
 *
 * @author Carlos
 */
class Tracker
{
    /**
     * Campaign's code
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $paramName = 'znc';

    public function process()
    {
        $newCode = null;
        if ($this->detectVk()) {
            $newCode = 'vk';
        } elseif (isset($_GET[$this->paramName])) {
            $newCode = $_GET[$this->paramName];
        }

        if (!is_null($newCode)) {
            $this->setCode($this->formatParam($newCode));
            $this->saveParamToCookies();

        } elseif (isset($_COOKIE[$this->paramName])){
            $newCode = $_COOKIE[$this->paramName];
            $this->setCode($this->formatParam($newCode));
        }
    }

    protected function detectVk(): bool
    {
        return
            isset($_SERVER['HTTP_REFERER'])
            && (stripos($_SERVER['HTTP_REFERER'], 'vk.com') !== false)
        ;
    }

    protected function saveParamToCookies()
    {
        setcookie($this->paramName, $this->getCode(), time()+60*60*24*30, '/');
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->paramName . '=' . $this->getCode();
    }

    /**
     * @return bool
     */
    public function hasCode()
    {
        return !is_null($this->code);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    private function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @param string $value
     *
     * @return string
     */
    protected function formatParam($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    /**
     * @var self
     */
    protected static $instance;

    /**
     * @return self
     */
    public static function gi()
    {
        if (is_null(self::$instance))
            self::$instance = new self;

        return self::$instance;
    }
}
