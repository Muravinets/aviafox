<?php

namespace Airline;

/**
 * https://support.travelpayouts.com/hc/ru/articles/203956163?flash_digest=4824306f1a2252ed63e0c4e5117efa26f3359560#12
 *
 * name — название авиакомпании.
 * alias — название альянса (если авиакомпания входит в какой-либо альянс).
 * iata — iata-код авиакомпании.
 * icao — icao-код авиакомпании.
 * callsign — позывной авиакомпании.
 * country — страна регистрации авиакомпании.
 * is_active — true: компания работает, false: нет.
 *
 * @author Igor Muravinets
 */
class Object
{
    
    public $codeIATA;
    public $codeICAO;
    public $name;
    public $alias;
    public $callsign;
    public $countryCode;
    public $isActive;

    /**
     * Single data
     * @var string
     */
    private $title;

    /**
     * Single data
     * @var string
     */
    private $content;

    /**
     * Detect if the airline has page with data
     * @return bool
     */
    public function hasData()
    {
        require_once __DIR__ . '/DataObject.php';
        $dataObject = new DataObject($this->getCode());
        return $dataObject->hasData();
    }

    /**
     * @return string
     */
    public function getURI()
    {
        return '/airlines/' . $this->getURIName();
    }

    /**
     * @return string
     */
    public function getURIName()
    {
        return str_replace(' ', '-', strtolower($this->name));
    }

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->importAllJSON($data);
        }
    }

    public function importAllJSON($data)
    {
        $this->codeIATA = $data->iata;
        $this->codeICAO = $data->icao;
        $this->name = $data->name;
        $this->alias = $data->alias;
        $this->countryCode = $data->country;
        $this->callsign = $data->callsign;
        $this->isActive = $data->is_active;
    }

    public function importSingleJSON($data)
    {
        $this->codeIATA = $data->codeIATA;
        $this->codeICAO = $data->codeICAO;
        $this->name = $data->name;
        $this->alias = $data->alias;
        $this->countryCode = $data->countryCode;
        $this->callsign = $data->callsign;
        $this->isActive = $data->isActive;

        $this->title = $data->title;
        $this->content = $data->content;
    }

    /**
     * @return string
     * @throws Error
     */
    public function getCode()
    {
        if (!is_null($this->codeIATA)) {
            return $this->codeIATA;
        }
        if (!is_null($this->codeICAO)) {
            return $this->codeICAO;
        }

        require_once 'Error.php';
        throw new Error('Undefined airline\'s code');
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

}