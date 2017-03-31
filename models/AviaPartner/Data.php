<?php

namespace AviaPartner;

require 'Object.php';

/**
 * @author Igor Muravinets
 *
 */
class Data
{
    
    /**
     * @var array
     */
    private $data;
    
    /**
     * @return array
     */
    public function getAll()
    {
        $this->load();
        
        return $this->data;
    }

    /**
     * Load data from the Data.tsv file
     */
    private function load()
    {
        $this->data = [];
    
        // Read file
        $filePath = __DIR__ . '/Data.tsv';
        $lines = file($filePath);
    
        foreach ($lines as $index => $line)
        {
            // Ignore first line with headers
            if (!$index) {
                continue;
            }
    
            $object = new Object(explode("\t", $line));
            
            // Ignore with undefined logo
            if (!$object->logoName) {
                continue;
            }

            if (strpos($object->logoName, '.svg')) {
                continue;
            }

            $this->data[] = $object;
        }
    }    
    
}