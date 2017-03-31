<?php

namespace Country;

require_once 'Object.php';

/**
 * https://support.travelpayouts.com/hc/ru/articles/203956163#09
 *
 * @author Igor Muravinets
 */
class Data
{
    
    /**
     * @var array
     */
    private $data;

    /**
     * Data constructor.
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     * @param $code
     * @return \Country\Object
     * @throws Error\CodeNotFound
     */
    public function findCode($code)
    {
        if (!isset($this->data[$code]))
        {
            require_once __DIR__ . '/Error/CodeNotFound.php';
            throw new Error\CodeNotFound($code);
        }

        return $this->data[$code];
    }

    /**
     * @param $uri string
     * @return \Country\Object
     * @throws Error\UriNotFound
     */
    public function findUri($uri)
    {
        /* @var $object \Country\Object */
        foreach ($this->data as $object)
        {
            if ($object->getUriName() == $uri)
            {
                return $object;
            }
        }

        require_once __DIR__ . '/Error/UriNotFound.php';
        throw new Error\UriNotFound($uri);
    }

    /**
     * @return array
     */
    public function getAll() : array
    {
        return $this->data;
    }

    /**
     * Load data from the Data.json file
     */
    private function load()
    {
        $this->data = [];
    
        // Read file
        $filePath = __DIR__ . '/Data.json';
        $json = file_get_contents($filePath);

        $data = json_decode($json);

        foreach ($data as $row)
        {
            $object = new Object;
            $object->importAllJSON($row);
            $this->data[$object->getCode()] = $object;
        }
    }

    /**
     * @var self
     */
    static protected $instance;

    /**
     * @return self
     */
    static public function getInstance() : self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}