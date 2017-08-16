<?php

namespace City;

require_once MDLD . '/Country/Data.php';

/**
 * https://support.travelpayouts.com/hc/ru/articles/203956163?flash_digest=4824306f1a2252ed63e0c4e5117efa26f3359560#10
 *
 * code — IATA код города.
 * name — название города.
 * coordinates — координаты города.
 * time_zone — часовой пояс относительно гринвича.
 * name_translations — название города на разных языках.
 * country_code — IATA код страны, в которой находится город.
 *
 * @author Igor Muravinets
 */
class Object
{
    /**
     * IATA код города
     * @var string
     */
    public $code;
    public $countryCode;
    public $name;

    /**
     * Название города, на текущий момент на русском языке
     * @var string
     */
    public $title;
    public $titleDestination;
    public $titleFrom;
    public $timeZone;

	/**
	 * @var string[]
	 */
    public $synonyms;

    /**
     * @var \Country\Object
     */
    private $country;

    /**
     * @var array
     */
    private $airlines;

    /**
     * @return bool
     * @throws Error
     */
    public function isRussian()
    {
        if (!$this->countryCode)
        {
            require_once __DIR__ . '/Error.php';
            throw new Error('Country code for city ' . $this->code . ' is undefined');
        }

        return ($this->countryCode == 'RU');
    }

    /**
     * Detect if the city has page with data
     * @return bool
     */
    public function hasData()
    {
        require_once __DIR__ . '/DataObject.php';
        $dataObject = new DataObject($this->name);
        return $dataObject->hasData();
    }

    public function loadData()
    {
	    require_once __DIR__ . '/DataObject.php';
	    $dataObject = new DataObject($this->name);
	    if (!$dataObject->hasData()) {
	    	require_once __DIR__ . '/Error.php';
	    	throw new Error('Data for city ' . $this->name . ' not found');
	    }

	    $this->importSingleJSON($dataObject->getData());
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return '/cities/' . $this->getUriName();
    }

    /**
     * @return string
     */
    public function getUriName()
    {
        return str_replace(' ', '-', strtolower($this->name));
    }

    public function importAllJSON($data)
    {
        $this->code = $data->code;
        $this->countryCode = $data->country_code;
        $this->name = $data->name;
        $this->timeZone = $data->time_zone;
        if (isset($data->name_translations->ru)) {
            $this->title = $data->name_translations->ru;
        }
        if (isset($data->synonyms)) {
            $this->synonyms = $data->synonyms;
        }
    }

    public function importSingleJSON($data)
    {
        $this->code = $data->code;
        $this->name = $data->name;
        $this->timeZone = $data->timeZone;
        $this->title = $data->title;
        $this->titleDestination = $data->titleDestination;
        $this->titleFrom = $data->titleFrom;
    }

    /**
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title ?? '';
    }

    /**
     * @return \Country\Object
     */
    public function getCountry() : \Country\Object
    {
        if (is_null($this->country)) {
            $this->country = \Country\Data::getInstance()->findCode($this->countryCode);
        }

        return $this->country;
    }

    /**
     * @return array
     */
    public function getAirlines() : array
    {
        return $this->airlines;
    }

}