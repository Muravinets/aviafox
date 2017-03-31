<?php
namespace Country;

require_once __DIR__ . '/Object.php';

class DataObject
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \Country\Object
     */
    private $object;

    /**
     * @return \Country\Object
     */
    public function getObject()
    {
        $this->load();
        return $this->object;
    }

    /**
     * DataObject constructor.
     * @param \Country\Object $object
     */
    public function __construct(\Country\Object $object)
    {
        $this->id = strtolower($object->getCode());
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
        return __DIR__ . '/Data/' . $this->id . '.json';
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