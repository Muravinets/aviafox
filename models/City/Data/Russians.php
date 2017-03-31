<?php
namespace City\Data;

require_once __DIR__ . '/../Data.php';
use City\Data;

class Russians extends Data
{

    protected function load()
    {
        parent::load();

        $result = [];

//        require_once __DIR__ . '/../../Debugger.php';
//        \Debugger::dump($this->data);

        /* @var $object \City\Object */
        foreach ($this->data as $object)
        {
            if ($object->countryCode !== 'RU')
            {
                continue;
            }

            $result[$object->code] = $object;
        }

        $this->data = $result;
    }
}