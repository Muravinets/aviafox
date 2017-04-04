<?php

namespace Country;

/**
 * https://support.travelpayouts.com/hc/ru/articles/203956163#09
 *
 * code — IATA код страны.
 * name — название страны.
 * currency — валюта страны.
 * name_translations — название страны на различных языках.
 *
 * @author Igor Muravinets
 */
class Object
{

    public $name;

    public $currency;

    /**
     * IATA Country code
     * @var string
     */
    private $code;

    /**
     * Country name in the Russian
     * @var string
     */
    private $title;

    /**
     * Country destination name in the Russian
     * @var string
     */
    private $titleDestination;

    /**
     * Country departure name in the Russian
     * @var string
     */
    private $titleDeparture;

    /**
     * Detect if the country has page with data
     * @return bool
     */
    public function hasData()
    {
        require_once __DIR__ . '/DataObject.php';
        $dataObject = new DataObject($this);
        return $dataObject->hasData();
    }

	public function loadData()
	{
		require_once __DIR__ . '/DataObject.php';
		$dataObject = new DataObject($this);
		if (!$dataObject->hasData())
		{
			require_once __DIR__ . '/Error.php';
			throw new Error('Data for country ' . $this->name . ' not found');
		}

		$this->importSingleJSON($dataObject->getData());
	}

    /**
     * @return string
     */
    public function getUri()
    {
        return '/countries/' . $this->getURIName();
    }

    /**
     * @return string
     */
    public function getUriName()
    {
        return str_replace(' ', '-', strtolower($this->name));
    }

    /**
     * @param object $data
     * @return $this
     */
    public function importAllJSON($data)
    {
        $this->code = $data->code;
        $this->name = $data->name;
        $this->currency = $data->currency;
        if (isset($data->name_translations->ru)) {
            $this->title = $data->name_translations->ru;
        }

        return $this;
    }

    public function importSingleJSON($data)
    {
        $this->code = $data->code;
        $this->name = $data->name;
        $this->currency = $data->currency;
        $this->title = $data->title;
        $this->titleDestination = $data->titleDestination;
        $this->titleDeparture = $data->titleDeparture;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getTitleDestination()
    {
        return $this->titleDestination;
    }

    /**
     * @return string
     */
    public function getTitleDeparture()
    {
        return $this->titleDeparture;
    }

}