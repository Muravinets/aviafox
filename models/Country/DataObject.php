<?php
namespace Country;

require_once __DIR__ . '/Object.php';

class DataObject
{
    /**
     * @var string
     */
    private $id;

    private $data;

    /**
     * DataObject constructor.
     * @param \Country\Object $object
     */
    public function __construct(\Country\Object $object)
    {
        $this->id = strtolower($object->getCode());
    }

    public function getData()
    {
	    $this->load();

    	return $this->data;
    }

    /**
     * @return \Country\Object
     */
    public function getObject() : \Country\Object
    {
	    $object = new Object();
	    $object->importSingleJSON($this->getData());

	    return $object;
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

        $this->data = json_decode($json);
    }
}