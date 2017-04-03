<?php
namespace City;

require_once __DIR__ . '/Object.php';

class DataObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $data;

    public function getData()
    {
    	$this->load();

    	return $this->data;
    }

    /**
     * @return Object
     */
    public function getObject() : Object
    {
	    $object = new Object();
	    $object->importSingleJSON($this->getData());

        return $object;
    }

    /**
     * DataObject constructor.
     * @param $name string
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function hasData()
    {
        return file_exists($this->getDataPath());
    }

    /**
     * @return string
     */
    private function getDataPath()
    {
        $name = str_replace(' ', '-', strtolower($this->name));
        return __DIR__ . '/Data/' . $name . '.json';
    }

    private function load()
    {
        // Read file
        $filePath = $this->getDataPath();
        $json = file_get_contents($filePath);

        $this->data = json_decode($json);
    }
}