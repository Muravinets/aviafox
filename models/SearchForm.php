<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 18/02/17
 * Time: 15:22
 */

class SearchForm
{
    private $aviaSubmitUrl = 'https://wl.aviafox.com/flights';

    private $locale = 'ru';
    private $marker;

    private $originCode;
    private $destinationCode;

    public function render()
    {
        $form = $this;
        include __DIR__ . '/../templates/search-form/container.php';
    }

    public function setOriginCode($value)
    {
        $this->originCode = $value;
        return $this;
    }

    public function setDestinationCode($value)
    {
        $this->destinationCode = $value;
        return $this;
    }

    public function getJSParams()
    {
        $params = [
            'locale'    => $this->getLocale(),
        ];
        if (isset($this->originCode)) {
            $params['default_origin'] = $this->originCode;
        }
        if (isset($this->destinationCode)) {
            $params['default_destination'] = $this->destinationCode;
            $params['default_hotel_location'] = $this->destinationCode;
        }

        return $params;
    }

    public function getAviaSubmitUrl() : string
    {
        return $this->aviaSubmitUrl;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @return string
     */
    public function getMarker()
    {
    	if (is_null($this->marker)) {
    		require_once MDLD . '/TP/Service.php';
		    $this->marker = TP\Service::getMarker();
	    }
        return $this->marker;
    }

}