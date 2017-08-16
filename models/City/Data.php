<?php

namespace City;

require_once 'Object.php';

use City\Error\CodeNotFound;
use City\Error\TitleNotFound;
use City\Error\UriNotFound;
use City\Object;

/**
 * @author Igor Muravinets
 *
 */
class Data
{
    
    /**
     * @var \City\Object[]
     */
    protected $data;

	/**
	 * @var \City\Object[]
	 */
    protected $dataTitled;

    /**
     * @var boolean
     */
    protected $isLoaded;

    /**
     * Data constructor.
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     * @param string $value
     * @return \City\Object
     * @throws CodeNotFound
     */
    public function findCode($value)
    {
        if (!isset($this->data[$value]))
        {
            require_once __DIR__ . '/Error/CodeNotFound.php';
            throw new CodeNotFound($value);
        }

        return $this->data[$value];
    }

    /**
     * @param string $value
     * @return \City\Object
     * @throws UriNotFound
     */
    public function findUri(string $value) : Object
    {
	    /* @var $object \City\Object */
	    foreach ($this->data as $object)
	    {
	    	if ($object->getUriName() === $value)
	    	{
	    		return $object;
		    }
	    }

        require_once __DIR__ . '/Error/UriNotFound.php';
        throw new UriNotFound($value);
    }

    /**
     * @param string $value
     * @return \City\Object
     * @throws TitleNotFound
     */
    public function findTitle(string $value) : Object
    {
    	if (is_null($this->dataTitled)) {
		    $this->dataTitled = $this->getList('title');
	    }

	    $value = mb_strtolower($value);

	    if (!isset($this->dataTitled[$value]))
	    {
		    require_once __DIR__ . '/Error/TitleNotFound.php';
		    throw new TitleNotFound($value);
	    }

        return $this->dataTitled[$value];
    }

    /**
     * @param $value
     * @return \City\Object|null
     */
    public function findName($value)
    {
        if (!isset($this->data[$value])) {
            return null;
        }
        return $this->data[$value];
    }

    /**
     * @param null|string $keyName
     * @return array
     */
    public function getList($keyName = null)
    {
        if (is_null($keyName))
        {
            return $this->data;
        }

        $result = [];

        /* @var $object \City\Object */
        foreach ($this->data as $object)
        {
        	switch ($keyName) {
        		case 'title': {
        		    $key = mb_strtolower($object->$keyName);
        		    break;
	            }
		        default:
        	        $key = $object->$keyName;
	        }

            $result[$key] = $object;
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $this->load();
        
        return $this->data;
    }

    /**
     * Load data from the Data.json file
     */
    protected function load()
    {
        if ($this->isLoaded)
        {
            return;
        }

        $this->data = [];
    
        // Read file
        $filePath = __DIR__ . '/Data.json';
        $json = file_get_contents($filePath);

        $data = json_decode($json);

        $this->data = [];
        foreach ($data as $row)
        {
            $city = new Object();
            $city->importAllJSON($row);

            $this->data[$city->code] = $city;
        }

        $this->isLoaded = TRUE;
    }
    
}