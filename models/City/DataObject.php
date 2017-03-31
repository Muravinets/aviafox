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
     * @var \City\Object
     */
    private $object;

    /**
     * @return Object
     */
    public function getObject()
    {
        $this->load();
        return $this->object;
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

        $this->object = new Object();
        $this->object->importSingleJSON(json_decode($json));
    }
}